const express = require ('express');
const router =  express.Router();
const User = require('../models/user');

router.get('/',async (req,res)=>{
   const users = await User.find();
   console.log(users);
   res.json(users );
});
router.get('/:id', async(req,res) =>{
    const users = await User.findById (req.params.id);
    res.json(users)
});

router.post('/', async(req,res)=>{
  const{name, phone,address,email}=req.body;
  const users = new User({name,phone,address,email});
  await users.save();
  res.json({status:'Task saved'});
});

router.put('/:id', async(req,res)=>{
   const { name, phone, address,email} = req.body;
   const newUser  = {name,phone,address,email};
    await User.findByIdAndUpdate(req.params.id, newUser);
   // console.log(req.params.id);
   res.json({status:'Task updated'});
});

router.delete('/:id', async(req,res)=>{
   await User.findByIdAndRemove(req.params.id);
   res.json({status:'Task deleted'});

})

module.exports = router;