var db = require('./db') ;

module.exports=
{
    get : function(callback)
    {
        var sql = "SELECT * FROM `notice`;";
        console.log(sql);
        db.getResults(sql,function(result)
        {
            if(result.length > 0)
            {
                callback(result);
            }
            else
            {
                callback([]);
            }
        });
    }
}
