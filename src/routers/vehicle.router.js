const express = require ('express');
const router =  express.Router();
const Vehicle =  require('../models/vehicle');

router.get('/',async (req,res)=>{
   const vehicles = await Vehicle.find();
   console.log(vehicles);
   res.json(vehicles );
});
// router.get('/:id', async(req,res) =>{
//     const task = await Task.findById (req.params.id);
//     res.json(task)
// });

// router.post('/', async(req,res)=>{
//   const{title, description}=req.body;
//   const task = new Task({title,description});
//   await task.save();
//   res.json({status:'Task saved'});
// });

// // router.put('/:id', async(req,res)=>{
// //    const { title, description} = req.body;
// //    const newTask  = {title,description};
// //     await Task.findByIdAndUpdate(req.params.id, newTask);
// //    // console.log(req.params.id);
// //    res.json({status:'Task updated'});
// // });

// // router.delete('/:id', async(req,res)=>{
// //    await Task.findByIdAndRemove(req.params.id);
// //    res.json({status:'Task deleted'});

// })

module.exports = router;