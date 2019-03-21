const mongoose  = require ('mongoose');
const {Schema} =mongoose ;

const AdministratorSchema  = new Schema({
    name:{type : String, required: true},
    password:{type: String, required: true},
    
});

module.exports = mongoose.model('administrators', AdministratorSchema)