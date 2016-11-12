//index.js
//获取应用实例
var app = getApp()
Page({
  data: {
    motto: 'Hello World',
    userInfo: {},
    array:[
      {name:'待发货',icon:'../../image/order-icon01.png'},
      {name:'待付款',icon:'../../image//order-icon03.png'},
      {name:'待收货',icon:'../../image//order-icon02.png'},
      {name:'待评价',icon:'../../image//order-icon04.png'},
    ],
    array1:[
      {name:'个人信息',icon:'../../image//self-icon01.png',url:'../../image//right.png'},
      {name:'我的收藏',icon:'../../image//self-icon02.png',url:'../../image//right.png'},
      {name:'消费记录',icon:'../../image//self-icon012.png',url:'../../image//right.png'},
      {name:'地址管理',icon:'../../image//self-icon04.png',url:'../../image//right.png'},
         {name:'我的分销',icon:'../../image//self-icon05.png',url:'../../image//right.png'},
        {name:'修改密码',icon:'../../image//self-icon011.png',url:'../../image//right.png'},
        {name:'账号绑定',icon:'../../image//self-icon013.png',url:'../../image//right.png'},
      ]
    //  array2:[
           
    //   ]
  },
  //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad: function () {
    console.log('onLoad')
    var that = this
    //调用应用实例的方法获取全局数据
    app.getUserInfo(function(userInfo){
      //更新数据
      that.setData({
        userInfo:userInfo
      })
    })
  }
  
})

// var app = getApp()
// Page( {
//   data: {
//     userInfo: {},
//     projectSource: 'https://github.com/liuxuanqiang/wechat-weapp-mall',
//     userListInfo: [ {
//       icon: '../../images/iconfont-dingdan.png',
//       text: '我的订单',
//       isunread: true,
//       unreadNum: 2
//     }, {
//         icon: '../../images/iconfont-card.png',
//         text: '我的代金券',
//         isunread: false,
//         unreadNum: 2
//       }, {
//         icon: '../../images/iconfont-icontuan.png',
//         text: '我的拼团',
//         isunread: true,
//         unreadNum: 1
//       }, {
//         icon: '../../images/iconfont-shouhuodizhi.png',
//         text: '收货地址管理'
//       }, {
//         icon: '../../images/iconfont-kefu.png',
//         text: '联系客服'
//       }, {
//         icon: '../../images/iconfont-help.png',
//         text: '常见问题'
//       }]
//   },
