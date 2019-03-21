const mongoose = require ('mongoose');

const URI = "mongodb://cluster0-mrytd.mongodb.net/test --username mymother1";
mongoose.connect(URI)
.then(() => {
   console.log("Connected to database!");
 })
 .catch((error) => {
   console.log("Connection failed!");
   console.log(error);
 });
module.exports = mongoose;                                     
