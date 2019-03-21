
const express = require ('express');
const router =  express.Router();

const Administrator = require('../models/administrator');

router.get('/',async (req,res)=>{
   const administrators = await Administrator.find();
   console.log(administrators);
   res.json(administrators );
});
router.get('/:id', async(req,res) =>{
    const administrators = await Administrator.findById (req.params.id);
    res.json(administrators)
});

router.post('/', async(req,res)=>{
  const{name, password}=req.body;
  const administrators = new Administrator({name,password});
  await administrators.save();
  res.json({status:'Task saved'});
});

router.put('/:id', async(req,res)=>{
   const { name, password} = req.body;
   const newTasAdministrator = {name,password};
    await Administrator.findByIdAndUpdate(req.params.id, newTasAdministrator);
   // console.log(req.params.id);
   res.json({status:'Task updated'});
});

router.delete('/:id', async(req,res)=>{
   await Administrator.findByIdAndRemove(req.params.id);
   res.json({status:'Task deleted'});

});

module.exports = router;