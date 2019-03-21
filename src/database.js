const mongoose = require ('mongoose');

const URI = "mongodb://localhost:27017/mymother";
mongoose.connect(URI)
.then(() => {
   console.log("Connected to database!");
 })
 .catch((error) => {
   console.log("Connection failed!");
   console.log(error);
 });
module.exports = mongoose;                                     
