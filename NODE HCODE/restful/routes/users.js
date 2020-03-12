let NeDB = require('nedb');

let db = new NeDB({
    filename:'users.db',
    autoload:true
});

module.exports = (app)=>{

    let route = app.route('/users');

    route.get((req, res) => {

        db.find({}).sort({name:1}).exec((err, users)=>{

            if(err) {
                app.utils.error.send(err, req, res);
            } else {
                res.statusCode = 200;
                res.setHeader('Content-Type', 'application/json');
                res.json({
                    users // ele entende que é users:users
                });

            }
            
        });
       
    });
  

    route.post((req, res) => {

        req.assert('name', 'O nome é obrigatório').notEmpty();
        req.assert('email', 'O email está invalido').notEmpty().isEmail();

        let errors = req.validationErrors();

        if(errors) {
            app.utils.error.send(err, req, res);
            return false;
        }

        db.insert(req.body, (err, user)=>{

            if (err){
                app.utils.error.send(err, req, res);
            } else {
                res.status(200).json(user);
            }
        });

    });

    //find , findone e insert são comando do neDB
    //pegando um usuario especifico
    let routeId = app.route('/users/:id');

    routeId.get((req ,res) => {

        db.findOne({_id:req.params.id}).exec((err, user)=>{

            if (err){
                app.utils.error.send(err, req, res);
            } else {
                res.status(200).json(user);
            }

        });
    });

    //Alterar
    routeId.put((req ,res) => {

        db.update({_id:req.params.id}, req.body, err => {

            if (err){
                app.utils.error.send(err, req, res);
            } else {

                /*o req.body nao vem o id , por que o id esta em req.params,
                 por isso usar o assign para juntar*/
                res.status(200).json(Object.assign(req.params, req.body));
            }

        });
    });

    //restapi delete
    routeId.delete((req, res)=>{
        //.remove do neDB
        db.remove({ _id: req.params.id }, {}, err=>{
            
            if (err){
                app.utils.error.send(err, req, res);
            } else {
                res.status(200).json(req.params);
            }
        });

    });
};
