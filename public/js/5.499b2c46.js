(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[5],{abb4:function(t,a,e){"use strict";e.r(a);var i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("q-layout",{attrs:{view:"hHh Lpr fFf"}},[e("app-header",{attrs:{left:t.left},on:{"left-drawer":t.isleftDrawer}}),e("q-drawer",{attrs:{side:"left",elevated:"",mini:t.miniState,"show-if-above":"",width:300,breakpoint:500,"content-class":"bg-grey-3"},on:{mouseover:function(a){t.miniState=!1},mouseout:function(a){t.miniState=!0}},model:{value:t.left,callback:function(a){t.left=a},expression:"left"}},[e("q-list",{attrs:{padding:""}},[e("q-expansion-item",{attrs:{"expand-separator":"",icon:"mail",label:"Mantenimiento",caption:"Tablas Categoria,Prod...","default-opened":""}},[e("q-item",{attrs:{clickable:"",tag:"a",to:"/categories"}},[e("q-item-section",{attrs:{avatar:""}},[e("q-icon",{attrs:{name:"school"}})],1),e("q-item-section",[e("q-item-label",[t._v("Categorias")]),e("q-item-label",{attrs:{caption:""}},[t._v("api/categorias")])],1)],1),e("q-item",{attrs:{clickable:"",tag:"a",to:"/products"}},[e("q-item-section",{attrs:{avatar:""}},[e("q-icon",{attrs:{name:"shopping_cart"}})],1),e("q-item-section",[e("q-item-label",[t._v("Productos")]),e("q-item-label",{attrs:{caption:""}},[t._v("api/productos")])],1)],1),e("q-item",{attrs:{clickable:"",tag:"a",to:"/ventas"}},[e("q-item-section",{attrs:{avatar:""}},[e("q-icon",{attrs:{name:"shopping_cart"}})],1),e("q-item-section",[e("q-item-label",[t._v("Ventas")]),e("q-item-label",{attrs:{caption:""}},[t._v("api/ventas")])],1)],1)],1),e("q-expansion-item",{attrs:{icon:"settings",label:"Configuracion",caption:"Tipo documentos..."}},[e("q-item",{attrs:{clickable:"",tag:"a",to:"tipo_documentos"}},[e("q-item-section",{attrs:{avatar:""}},[e("q-icon",{attrs:{name:"school"}})],1),e("q-item-section",[e("q-item-label",[t._v("Tipo de Documentos")]),e("q-item-label",{attrs:{caption:""}},[t._v("api/tipo_documentos")])],1)],1)],1),e("q-item",{attrs:{clickable:"",tag:"a",to:"tienda"}},[e("q-item-section",{attrs:{avatar:""}},[e("q-icon",{attrs:{name:"school"}})],1),e("q-item-section",[e("q-item-label",[t._v("Tinda")]),e("q-item-label",{attrs:{caption:""}},[t._v("api/categorias")])],1)],1)],1)],1),e("q-page-container",[e("div",{staticClass:"q-pa-sm"},[e("transition",{attrs:{name:"mainlayoutTransition","enter-active-class":"animated fadeIn","leave-active-class":"animated fadeOutDown",mode:"out-in"}},[e("router-view")],1)],1)]),e("app-footer")],1)},n=[],o=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("q-header",{staticClass:"bg-primary text-white",attrs:{elevated:""}},[e("q-toolbar",[e("q-btn",{attrs:{dense:"",flat:"",round:"",icon:"menu"},on:{click:function(a){return t.$emit("left-drawer",!t.left)}}}),e("q-toolbar-title",[e("q-avatar",[e("img",{attrs:{src:"statics/img/quasar-logo.svg"}})]),t._v("\n      Facturacion con Laravel\n    ")],1),e("q-btn-dropdown",{attrs:{stretch:"",flat:"",label:"Idioma"}},t._l(t.options,(function(a,i){return e("q-list",{key:"Lang"+i,attrs:{value:a},on:{click:function(e){return t.setLanguage(a)}}},[e("q-item",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{clickable:"",tabindex:"0"}},[e("q-item-section",[e("q-item-label",[t._v(t._s(a))])],1)],1)],1)})),1),e("q-btn",{attrs:{dense:"",flat:"",round:"",icon:"account_circle"}},[e("q-menu",[e("div",{staticClass:"row no-wrap q-pa-md"},[e("div",{staticClass:"column"},[e("div",{staticClass:"text-h6 q-mb-md"},[t._v("Settings")]),e("q-input",{attrs:{value:"Administrador",type:"text",label:"Tipo",readonly:""}})],1),e("q-separator",{staticClass:"q-mx-lg",attrs:{vertical:"",inset:""}}),e("div",{staticClass:"column items-center"},[e("q-avatar",{attrs:{size:"72px"}},[e("img",{attrs:{src:"https://cdn.quasar.dev/img/avatar4.jpg"}})]),e("div",{staticClass:"text-subtitle1 q-mt-md q-mb-xs"},[t._v("John Doe")]),e("q-btn",{attrs:{color:"primary",label:"Logout",push:"",size:"sm"},on:{click:t.cerrarSesion}})],1)],1)])],1)],1)],1)},s=[],r=e("7bb1"),l={name:"AppHeader",props:["left"],data:function(){return{options:["es","en"]}},methods:{cerrarSesion:function(){this.$auth.logout({makeRequest:!0,redirect:"/auth/login"})},setLanguage:function(t){this.$i18n.locale=t,Object(r["d"])(t)}}},c=l,m=e("2877"),p=e("e359"),u=e("65c6"),d=e("9c40"),b=e("6ac5"),q=e("cb32"),v=e("f20b"),f=e("1c1c"),g=e("66e5"),h=e("4074"),_=e("0170"),Q=e("4e73"),w=e("27f9"),x=e("eb85"),k=e("7f67"),y=e("eebe"),C=e.n(y),L=Object(m["a"])(c,o,s,!1,null,null,null),T=L.exports;C()(L,"components",{QHeader:p["a"],QToolbar:u["a"],QBtn:d["a"],QToolbarTitle:b["a"],QAvatar:q["a"],QBtnDropdown:v["a"],QList:f["a"],QItem:g["a"],QItemSection:h["a"],QItemLabel:_["a"],QMenu:Q["a"],QInput:w["a"],QSeparator:x["a"]}),C()(L,"directives",{ClosePopup:k["a"]});var I=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("q-footer",{staticClass:"bg-grey-8 text-white",attrs:{elevated:"","height-hint":"20"}},[e("q-toolbar",[e("q-toolbar-title",[e("q-avatar",[e("img",{attrs:{src:"statics/img/quasar-logo.svg"}})]),e("div",{staticClass:"text-right"},[t._v("\n        "+t._s(t.$t("general.powered_by"))+"\n        "),e("a",{attrs:{href:"http://bytefury.com/",target:"_blank"}},[t._v(t._s(t.$t("general.bytefury"))+"\n        ")])])],1)],1)],1)},S=[],$={name:"AppFooter"},A=$,D=e("7ff0"),j=Object(m["a"])(A,I,S,!1,null,null,null),F=j.exports;C()(j,"components",{QFooter:D["a"],QToolbar:u["a"],QToolbarTitle:b["a"],QAvatar:q["a"]});var O={name:"MainLayout",components:{AppHeader:T,AppFooter:F},data:function(){return{left:!1,miniState:!1}},methods:{isleftDrawer:function(t){this.left=t}}},E=O,H=e("4d5a"),P=e("9404"),J=e("3b73"),M=e("0016"),z=e("09e3"),B=Object(m["a"])(E,i,n,!1,null,null,null);a["default"]=B.exports;C()(B,"components",{QLayout:H["a"],QDrawer:P["a"],QList:f["a"],QExpansionItem:J["a"],QItem:g["a"],QItemSection:h["a"],QIcon:M["a"],QItemLabel:_["a"],QPageContainer:z["a"]})}}]);