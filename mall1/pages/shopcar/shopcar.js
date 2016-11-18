// shopcar.js
var app = getApp();
Page({
  data:{
    array:[{
        src:"../../image/index-ph02.png",
        model:"scaleToFill",
        content:"超级大品牌服装，现在买只要9298",
        color:"颜色：经典绮丽款",
        cm:"尺寸:L",
        big:"+",
        small:"-",
        money:"￥3235.00",
        src1:"../../image/shopcar-icon01.png"
    },{
        src:"../../image/index-ph02.png",
        model:"scaleToFill",
        content:"超级大品牌服装，现在买只要9298",
        color:"颜色：经典绮丽款",
        cm:"尺寸:L",
        big:"+",
        small:"-",
        money:"￥3235.00",
        src1:"../../image/shopcar-icon01.png"
    },{
        src:"../../image/index-ph02.png",
        model:"scaleToFill",
        content:"超级大品牌服装，现在买只要9298",
        color:"颜色：经典绮丽款",
        cm:"尺寸:L",
        big:"+",
        small:"-",
        money:"￥3235.00",
        src1:"../../image/shopcar-icon01.png"
    },{
        src:"../../image/index-ph02.png",
        model:"scaleToFill",
        content:"超级大品牌服装，现在买只要9298",
        color:"颜色：经典绮丽款",
        cm:"尺寸:L",
        big:"+",
        small:"-",
        money:"￥3235.00",
        src1:"../../image/shopcar-icon01.png"
    }]
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    console.log('onload')
    var that = this
    app.getUserInfo(function(userInfo){
        // 更新数据
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