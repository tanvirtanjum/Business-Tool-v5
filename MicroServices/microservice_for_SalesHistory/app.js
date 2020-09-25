var express=require('express');
var app=express();
var show=require('./controllers/showHistoryController');




app.get('/',function (req,res) {
    res.json({});
})

app.use('/show',show);

app.listen(3000,function () {
    console.log('Sales History Api server running on port 3000...')
})
