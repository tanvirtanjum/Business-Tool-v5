var express=require('express');
var router=express.Router();
var history=require('../models/showNotice');

router.get('/',function (req,res) {

   history.get(function (results) {
       console.log(results);
       res.json(results);
   });
});


module.exports=router;
