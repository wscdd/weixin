//first.js
//获取应用实例
// var status = true;
// Page({
//   toastShow: function(event) {
//     console.log("触发了点击事件，弹出toast")
//     status = false
//     this.setData({status:status})　　　　//tData方法可以建立新的data属性，从而起到跟视图实时同步的效果
//   },
//   toastHide:function(event){
//       console.log("触发bindchange，隐藏toast") 
//       status =true
//       this.setData({status:status})
//   },
//   data:{
//       status:status　　　　　　　　　　　　//data里面的属性可以传递到视图
//   }
// })
Page({
  data: {
    // Carousel: [
    //   '../../uploads/banner1.jpg',
    //   '../../uploads/banner1.jpg',
    //   '../../uploads/banner1.jpg'
    // ],
    icon: "../../img/icon/ftmenu3.png",
    ad:[
      "../../img/homenav1.jpg",
      "../../img/homenav2.jpg",
      "../../img/homenav3.jpg",
      "../../img/homenav4.jpg",
      "../../img/homenav11.jpg",
      "../../img/homenav22.jpg",       
      "../../img/homenav33.jpg",
      "../../img/homenav44.jpg",           
              
    ],
    biao:"../../img/hometit1.jpg",
    ty:"../../uploads/t1.jpg",
    type1:[ 
       "../../uploads/t2.jpg", 
       "../../uploads/t2.jpg",
       "../../uploads/t2.jpg"  
        
    ],
    biao2:"../../img/hometit2.jpg",
    type2:[
     {icon: '../../uploads/t3.jpg',name:'中系穿搭'},
     {icon: "../../uploads/t3.jpg",name:"美妆美搭"},
     {icon: "../../uploads/t3.jpg",name:"夏日新款"}, 
     ],
    biao3:"../../img/hometit3.jpg",
    biao4:"../../uploads/sch-banner.jpg",
      type3:[
      {icon:'../../uploads/t6.jpg',name:'纯色短袖'},
      {icon:'../../uploads/t5.jpg',name:'街头风格纯色'},
      {icon:'../../uploads/t6.jpg',name:'纯色短袖'},
    ],
    type4:[
      {icon:'../../uploads/t5.jpg',name:'圆领套头'},
      {icon:'../../uploads/t15.jpg',name:'T恤衫239222'},
      {icon:'../../uploads/t14.jpg',name:'街头风格纯色'},
    ],
    indicatorDots: true,
    autoplay: true,
    interval: 2000,
    duration: 1000
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    console.log('onLoad')
    var that = this
    //调取接口开始
    wx.request({ 
      url: 'http://www.lliujingwei.com/index.php', //仅为示例，并非真实的接口地址 
      method:'GET',
      header: { 'Content-Type': 'application/json' }, 
      success: 
      function(res) { 
         that.setData({'Carousel': res.data})
         } ,
        fail:
        function(res){
          console.log('no')
        }
 })
  // 调取接口结束
  },
})