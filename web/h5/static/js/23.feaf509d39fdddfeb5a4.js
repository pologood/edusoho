webpackJsonp([23],{mEXA:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=n("//Fk"),i=n.n(r),s=n("Xxa5"),a=n.n(s),u=(n("eqfM"),n("/QYm")),o=n("exGp"),c=n.n(o),d=n("Dd8w"),l=n.n(d),p=n("PirY"),f=n.n(p),y=n("NYxO"),P=(n("gyMJ"),{data:function(){return{isEncryptionPlus:!1}},computed:l()({},Object(y.mapState)("course",{sourceType:function(e){return e.sourceType},selectedPlanId:function(e){return e.selectedPlanId},taskId:function(e){return e.taskId},details:function(e){return e.details},joinStatus:function(e){return e.joinStatus},user:function(e){return e.user}})),created:function(){this.initPlayer()},methods:{getParams:function(){return!this.joinStatus?{query:{courseId:this.selectedPlanId,taskId:this.taskId},params:{preview:1}}:{query:{courseId:this.selectedPlanId,taskId:this.taskId}}},initPlayer:function(){var e=this;return c()(a.a.mark(function t(){var n,r;return a.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:if(e.$refs.audio&&(e.$refs.audio.innerHTML=""),n=e.$route.query,e.isEncryptionPlus=n.isEncryptionPlus,!n.isEncryptionPlus){t.next=6;break}return Object(u.a)("该浏览器不支持云视频播放，请下载App"),t.abrupt("return");case 6:r={id:"course-detail__audio--content",user:e.user,playlist:n.playlist,template:n.text,autoplay:!0,simpleMode:!0},e.$store.commit("UPDATE_LOADING_STATUS",!0),e.loadPlayerSDK().then(function(t){e.$store.commit("UPDATE_LOADING_STATUS",!1);new t(r)});case 9:case"end":return t.stop()}},t,e)}))()},loadPlayerSDK:function(){if(!window.AudioPlayerSDK){var e="//service-cdn.qiqiuyun.net/js-sdk/audio-player/sdk-v1.js?v="+Date.now()/1e3/60;return new i.a(function(t,n){f()(e,function(e){e&&n(e),t(window.AudioPlayerSDK)})})}return i.a.resolve(window.AudioPlayerSDK)}}}),m={render:function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"course-detail__audio"},[t("div",{directives:[{name:"show",rawName:"v-show",value:!this.isEncryptionPlus,expression:"!isEncryptionPlus"}],ref:"audio",staticClass:"course-detail__audio--content",attrs:{id:"course-detail__audio--content"}})])},staticRenderFns:[]},v=n("VU/8")(P,m,!1,null,null,null);t.default=v.exports}});