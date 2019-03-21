const express = require ('express');
const router =  express.Router();
const Chat = require('../models/chat');

router.get('/',async (req,res)=>{
   const chats = await Chat.find();
   console.log(chats);
   res.json(chats );
});
// router.get('/:id', async(req,res) =>{
//     const chats = await Chat.findById (req.params.id);
//     res.json(chats )
// });

// router.post('/', async(req,res)=>{
//   const{title, description}=req.body;
//   const task = new Task({title,description});
//   await task.save();
//   res.json({status:'Task saved'});
// });

// router.put('/:id', async(req,res)=>{
//    const { title, description} = req.body;
//    const newTask  = {title,description};
//     await Task.findByIdAndUpdate(req.params.id, newTask);
//    // console.log(req.params.id);
//    res.json({status:'Task updated'});
// });

// router.delete('/:id', async(req,res)=>{
//    await Task.findByIdAndRemove(req.params.id);
//    res.json({status:'Task deleted'});

// });

module.exports = router;