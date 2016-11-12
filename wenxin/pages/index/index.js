//index.js
//获取应用实例
// var app = getApp()
// Page({
//   data: {
//     motto: '刘靖伟',
//     userInfo: {}
//   },
//   //事件处理函数
//   bindViewTap: function() {
//     wx.navigateTo({
//       url: '../logs/logs'
//     })
//   },
//   onLoad: function () {
//     console.log('onLoad')
//     var that = this
//     //调用应用实例的方法获取全局数据
//     app.getUserInfo(function(userInfo){
//       //更新数据
//       that.setData({
//         userInfo:userInfo
//       })
//     })
//   },
//   src: '../images/bj.png'
// })
Page({
  data: {
    imgUrls: [
      'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg',
      'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg',
      'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg'
    ],
     indicatorDots: true,
    autoplay: true,
    interval: 2000,
    duration: 1000,
    array: [{ icon:'../images/icon.png',dname:'充值' },
            {icon:'../images/icon1.png',dname:'签到'},
           {icon:'../images/icon2.png',dname:'红包'}, 
           {icon:'../images/icon3.png',dname:'即将上线'}, 
           {icon:'../images/icon4.png',dname:'零食飞速'},
           {icon:'../images/icon5.png',dname:'超市'}],
    feature:[{icon:'../images/test.png',fname:'猪骨头棒新鲜生鲜肉制品猪大骨头筒骨熬汤佳品500g'},
             {icon:'../images/test.png1',fname:'冻品批发大江鸡腿 冷鲜鸡腿放心食材1kg 冷冻食材'},
             {icon:'../images/test.png2',fname:'法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮'},
             {icon:'../images/test.png21',fname:'法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮'},
             {icon:'../images/test.png2',fname:'猪骨头棒新鲜生鲜肉制品猪大骨头筒骨熬汤佳品500g'},
             {icon:'../images/test.png1',fname:'冻品批发大江鸡腿 冷鲜鸡腿放心食材1kg 冷冻食材'},
             {icon:'../images/test.png2',fname:'法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮'},
             {icon:'../images/test.png21',fname:'法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮'}
            ]
   },
  changeIndicatorDots: function(e){
    this.setData({
      indicatorDots: !this.data.indicatorDots
    })
  },
  changeAutoplay: function(e) {
    this.setData({
      autoplay: !this.data.autoplay
    })
  },
  intervalChange: function(e) {
    this.setData({
      interval: e.detail.value
    })
  },
  durationChange: function(e) {
    this.setData({
      duration: e.detail.value
    })
  }
})
