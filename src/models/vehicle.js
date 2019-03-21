const mongoose  = require ('mongoose');
const {Schema} =mongoose ;

const VehicleSchema  = new Schema({
    _id: mongoose.Schema.Types.ObjectId,
    name :{type :String, required:true}

});

module.exports = mongoose.model('vehicles',VehicleSchema)