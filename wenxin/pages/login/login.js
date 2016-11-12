//login.js
var app = getApp()
Page({
  data:{
    input:"请输入用户名/手机号",
    password:"请输入密码",
    login:"登陆",
    Content:"我要登录",
    forget:"忘记密码？",
    reg:"免费注册",
    mode: 'scaleToFill',
    src:'../../image/login.png',
    src1:'../../image/password.png'
  },
  onLoad: function(options) {
    this.setData({
      title: options.title
    })
  },
  imageError: function(e) {
        console.log('image3发生error事件，携带值为', e.detail.errMsg)
    },
    //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    console.log('onLoad')
    var that = this
    //调用应用实例的方法获取全局数据
    app.getUserInfo(function(userInfo){
      //更新数据
      that.setData({
        userInfo:userInfo
      })
    })
  },
  onReady:function(){
    // 页面渲染完成
    
  },
  onShow:function(){
    // 页面显示
    
  },
  onHide:function(){
    // 页面隐藏
    
  },
  onUnload:function(){
    // 页面关闭
    
  }
})