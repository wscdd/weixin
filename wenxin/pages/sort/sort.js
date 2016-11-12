//获取应用实例
var app = getApp()
Page({
  data: {
    sort:[{
        image:"../../image/classify05.png",
        span:"化妆品",
    },{
        image:"../../image/classify06.png",
        span:"居家百货",
    },{
        image:"../../image/classify07.png",
        span:"时尚智能",
    },{
        image:"../../image/classify08.png",
        span:"营养保健",
    },{
        image:"../../image/classify09.png",
        span:"女鞋箱包",
    },{
        image:"../../image/classify01.png",
        span:"母婴用品",
    },{
        image:"../../image/classify02.png",
        span:"女装正品",
    },{
        image:"../../image/classify03.png",
        span:"男装正品",
    },{
        image:"../../image/classify04.png",
        span:"内衣服饰",
    },],

    banner:"../../image/classify-ph01.png",

    // array:[{
    //     dt:"宝宝营养",
    // },{
    //     dt:"妈妈专区",
    // },],
    dt:"宝宝营养",
    second:"妈妈专区",
    icon:"../../image/serach.png",
    src:[
    //     {
    //     dt:"宝宝营养",
    // },
    {
        image:"../../image/classify-ph02.png",
        span:'BABY',
    },{
        image:"../../image/classify-ph03.png",
         span:'添冲剂',
    },{
        image:"../../image/classify-ph02.png",
         span:'BABY',
    },{
        image:"../../image/classify-ph03.png",
         span:'添冲剂',
    },],
    second2:[{
        image:"../../image/classify-ph05.png",
        span:'BABY',
    },{
        image:"../../image/classify-ph04.png",
         span:'添冲剂',
    },{
        image:"../../image/classify-ph05.png",
         span:'BABY',
    },{
        image:"../../image/classify-ph04.png",
         span:'添冲剂',
    },],
    motto: 'Hello World',
    userInfo: {},
    toView: 'red',
    scrollTop: 100
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