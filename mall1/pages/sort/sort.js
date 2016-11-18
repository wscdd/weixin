//获取应用实例
var app = getApp()
Page({
  data: {
    sort:[{
        image:"../images/classify05.png",
        span:"化妆品",
    },{
        image:"../images/classify06.png",
        span:"居家百货",
    },{
        image:"../images/classify07.png",
        span:"时尚智能",
    },{
        image:"../images/classify08.png",
        span:"营养保健",
    },{
        image:"../images/classify09.png",
        span:"女鞋箱包",
    },{
        image:"../images/classify01.png",
        span:"母婴用品",
    },{
        image:"../images/classify02.png",
        span:"女装正品",
    },{
        image:"../images/classify03.png",
        span:"男装正品",
    },{
        image:"../images/classify04.png",
        span:"内衣服饰",
    },],

    banner:"../images/classify-ph01.png",

    // array:[{
    //     dt:"宝宝营养",
    // },{
    //     dt:"妈妈专区",
    // },],
    dt:"宝宝营养",
    second:"妈妈专区",
    icon:"../images/serach.png",
    src:[
    //     {
    //     dt:"宝宝营养",
    // },
    {
        image:"../images/classify-ph02.png",
        span:'BABY',
    },{
        image:"../images/classify-ph03.png",
         span:'添冲剂',
    },{
        image:"../images/classify-ph02.png",
         span:'BABY',
    },{
        image:"../images/classify-ph03.png",
         span:'添冲剂',
    },],
    second2:[{
        image:"../images/classify-ph05.png",
        span:'BABY',
    },{
        image:"../images/classify-ph04.png",
         span:'添冲剂',
    },{
        image:"../images/classify-ph05.png",
         span:'BABY',
    },{
        image:"../images/classify-ph04.png",
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