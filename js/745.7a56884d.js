"use strict";(globalThis["webpackChunkclient"]=globalThis["webpackChunkclient"]||[]).push([[745],{2745:(e,t,o)=>{o.r(t),o.d(t,{default:()=>B});var a=o(9835);function s(e,t,o,s,n,i){const l=(0,a.up)("SideChat"),r=(0,a.up)("MainChat"),u=(0,a.up)("q-page-container"),c=(0,a.up)("q-layout");return(0,a.wg)(),(0,a.j4)(c,{view:"lHh Lpr lFf"},{default:(0,a.w5)((()=>[(0,a.Wm)(l,{onChooseContact:t[0]||(t[0]=t=>e.changeContact(t))}),(0,a.Wm)(u,null,{default:(0,a.w5)((()=>[(0,a.Wm)(r,{chooseContact:e.chooseMyContact,ref:"chooseContactRef"},null,8,["chooseContact"])])),_:1})])),_:1})}var n=o(499);function i(e,t,o,s,n,i){const l=(0,a.up)("q-avatar"),r=(0,a.up)("q-item-section"),u=(0,a.up)("q-item-label"),c=(0,a.up)("q-item"),m=(0,a.up)("q-separator"),h=(0,a.up)("q-list"),d=(0,a.up)("q-scroll-area"),p=(0,a.up)("q-drawer"),w=(0,a.Q2)("ripple");return(0,a.wg)(),(0,a.j4)(p,{"show-if-above":"",width:350,breakpoint:500,bordered:""},{default:(0,a.w5)((()=>[(0,a.Wm)(d,{class:"fit"},{default:(0,a.w5)((()=>[(0,a.Wm)(h,{separator:""},{default:(0,a.w5)((()=>[(0,a.wy)(((0,a.wg)(),(0,a.j4)(c,{class:"q-my-sm",onClick:t[0]||(t[0]=t=>e.test()),clickable:""},{default:(0,a.w5)((()=>[(0,a.Wm)(r,{avatar:""},{default:(0,a.w5)((()=>[(0,a.Wm)(l,{color:"primary","text-color":"white"},{default:(0,a.w5)((()=>[(0,a.Uk)(" JL ")])),_:1})])),_:1}),(0,a.Wm)(r,null,{default:(0,a.w5)((()=>[(0,a.Wm)(u,{lines:"1"},{default:(0,a.w5)((()=>[(0,a.Uk)("Joshua Lionel Sumilat")])),_:1}),(0,a.Wm)(u,{caption:"",lines:"2",class:"text-weight-bold"},{default:(0,a.w5)((()=>[(0,a.Uk)("Data Scientist")])),_:1}),(0,a.Wm)(u,{caption:"",lines:"3"},{default:(0,a.w5)((()=>[(0,a.Uk)(" okee siap mas Andrew ")])),_:1})])),_:1}),(0,a.Wm)(r,{side:"",top:""},{default:(0,a.w5)((()=>[(0,a.Uk)(" 10:30 ")])),_:1})])),_:1})),[[w]]),(0,a.Wm)(m),(0,a.wy)(((0,a.wg)(),(0,a.j4)(c,{class:"q-my-sm",onClick:t[1]||(t[1]=t=>e.$emit("chooseContact",!1)),clickable:""},{default:(0,a.w5)((()=>[(0,a.Wm)(r,{avatar:""},{default:(0,a.w5)((()=>[(0,a.Wm)(l,{color:"primary","text-color":"white"},{default:(0,a.w5)((()=>[(0,a.Uk)(" ES ")])),_:1})])),_:1}),(0,a.Wm)(r,null,{default:(0,a.w5)((()=>[(0,a.Wm)(u,{lines:"1"},{default:(0,a.w5)((()=>[(0,a.Uk)("Enriko Setiawan")])),_:1}),(0,a.Wm)(u,{caption:"",lines:"2",class:"text-weight-bold"},{default:(0,a.w5)((()=>[(0,a.Uk)("Data Scientist")])),_:1}),(0,a.Wm)(u,{caption:"",lines:"3"},{default:(0,a.w5)((()=>[(0,a.Uk)(" okee siap mas Andrew ")])),_:1})])),_:1}),(0,a.Wm)(r,{side:"",top:""},{default:(0,a.w5)((()=>[(0,a.Uk)(" Yesterday ")])),_:1})])),_:1})),[[w]]),(0,a.Wm)(m)])),_:1})])),_:1})])),_:1})}const l=(0,a.aZ)({name:"SideChat",setup(){return{}},methods:{test1:()=>{alert("yes"),(void 0).$emit("changeChooseContact",!1)},test(){this.$emit("chooseContact",!1)}}});var r=o(1639),u=o(6590),c=o(6663),m=o(3246),h=o(490),d=o(1233),p=o(1357),w=o(3115),g=o(926),f=o(1136),y=o(9984),k=o.n(y);const b=(0,r.Z)(l,[["render",i]]),v=b;k()(l,"components",{QDrawer:u.Z,QScrollArea:c.Z,QList:m.Z,QItem:h.Z,QItemSection:d.Z,QAvatar:p.Z,QItemLabel:w.Z,QSeparator:g.Z}),k()(l,"directives",{Ripple:f.Z});var C=o(6970);const W={key:0,class:"text-grey text-h3 row justify-center items-center",style:{height:"100vh"}};function _(e,t,o,s,n,i){const l=(0,a.up)("q-chat-message"),r=(0,a.up)("q-btn"),u=(0,a.up)("q-input"),c=(0,a.up)("q-form"),m=(0,a.up)("q-toolbar"),h=(0,a.up)("q-footer"),d=(0,a.up)("q-page");return(0,a.wg)(),(0,a.j4)(d,{class:"page-chat flex column",ref:"pageChat"},{default:(0,a.w5)((()=>[!0===e.view?((0,a.wg)(),(0,a.iD)("div",W," Pilih kontak untuk memulai chat ")):(0,a.kq)("",!0),!1===e.view?((0,a.wg)(),(0,a.iD)("div",{key:1,class:(0,C.C_)(["q-pa-lg",{invisible:!e.showMessages}])},[(0,a.Wm)(l,{name:"me",text:["hey, how are you?"],sent:"",size:"5",stamp:"10 minutes ago","text-color":"white","bg-color":"teal-7"}),(0,a.Wm)(l,{name:"Enriko",text:["doing fine, how r you?","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"],stamp:"5 minutes ago",size:"5","text-color":"white","bg-color":"blue-grey-8"},null,8,["text"]),(0,a.Wm)(l,{name:"Enriko",text:["doing fine, how r you?","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"],stamp:"5 minutes ago",size:"5","text-color":"white","bg-color":"blue-grey-8"},null,8,["text"]),(0,a.Wm)(l,{name:"Enriko",text:["doing fine, how r you?","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"],stamp:"5 minutes ago",size:"5","text-color":"white","bg-color":"blue-grey-8"},null,8,["text"])],2)):(0,a.kq)("",!0),!1===e.view?((0,a.wg)(),(0,a.j4)(h,{key:2,class:"bg-cyan-10",elevated:""},{default:(0,a.w5)((()=>[(0,a.Wm)(m,null,{default:(0,a.w5)((()=>[(0,a.Wm)(c,{class:"full-width"},{default:(0,a.w5)((()=>[(0,a.Wm)(u,{"bg-color":"white",onBlur:e.scrollToBottom,ref:"newMessage",outlined:"",rounded:"",dense:"",label:"Message"},{after:(0,a.w5)((()=>[(0,a.Wm)(r,{round:"",dense:"",flat:"",type:"submit",color:"white",icon:"send"})])),_:1},8,["onBlur"])])),_:1})])),_:1})])),_:1})):(0,a.kq)("",!0)])),_:1},512)}const x=(0,a.aZ)({name:"MainChat",props:["chooseContact"],data(){return{view:this.chooseContact,showMessages:!1}},mounted(){},methods:{scrollToBottom(){console.log("masuk sini");let e=this.$refs.pageChat.$el;setTimeout((()=>{window.scrollTo(0,e.scrollHeight)}),20)}},watch:{}});var Z=o(9885),q=o(396),L=o(1378),I=o(1663),Q=o(8326),M=o(4925),S=o(9379);const U=(0,r.Z)(x,[["render",_]]),T=U;k()(x,"components",{QPage:Z.Z,QChatMessage:q.Z,QFooter:L.Z,QToolbar:I.Z,QForm:Q.Z,QInput:M.Z,QBtn:S.Z});const $=(0,a.aZ)({name:"ChatLayout",components:{SideChat:v,MainChat:T},data(){const e=(0,n.iH)(!1);return{chooseMyContact:!0,leftDrawerOpen:e,toggleLeftDrawer(){e.value=!e.value}}},mounted(){},methods:{changeContact(e){this.chooseMyContact=e,this.$refs.chooseContactRef.view=e,this.$refs.chooseContactRef.scrollToBottom(),setTimeout((()=>{this.$refs.chooseContactRef.showMessages=!0}),200)}}});var j=o(249),A=o(2133);const D=(0,r.Z)($,[["render",s]]),B=D;k()($,"components",{QLayout:j.Z,QPageContainer:A.Z})}}]);