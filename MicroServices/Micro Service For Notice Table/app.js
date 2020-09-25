var express=require('express');
var app=express();
var notice=require('./controllers/showNoticeController');
var emp=require('./controllers/empListController');




app.get('/',function (req,res) {
    res.json({});
})

app.use('/notice',notice);
app.use('/employee',emp);

app.listen(3333,function () {
    console.log('Microservice For Notice Started At PORT: 3333')
})
