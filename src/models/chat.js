const mongoose  = require ('mongoose');
const {Schema} =mongoose ;

const ChatSchema  = new Schema({
    
});

module.exports = mongoose.model('chats', ChatSchema)