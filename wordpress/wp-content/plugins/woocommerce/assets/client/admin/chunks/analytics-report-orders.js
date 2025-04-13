"use strict";(globalThis.webpackChunk_wcAdmin_webpackJsonp=globalThis.webpackChunk_wcAdmin_webpackJsonp||[]).push([[3576],{84384:(e,o,t)=>{t.d(o,{O3:()=>s,be:()=>m,u8:()=>n});var r=t(65736),c=t(92694),a=t(45719),l=t(91978);const s=(0,c.applyFilters)("woocommerce_admin_orders_report_charts",[{key:"orders_count",label:(0,r.__)("Orders","woocommerce"),type:"number"},{key:"net_revenue",label:(0,r.__)("Net sales","woocommerce"),order:"desc",orderby:"net_total",type:"currency"},{key:"avg_order_value",label:(0,r.__)("Average order value","woocommerce"),type:"currency"},{key:"avg_items_per_order",label:(0,r.__)("Average items per order","woocommerce"),order:"desc",orderby:"num_items_sold",type:"average"}]),n=(0,c.applyFilters)("woocommerce_admin_orders_report_filters",[{label:(0,r.__)("Show","woocommerce"),staticParams:["chartType","paged","per_page"],param:"filter",showFilters:()=>!0,filters:[{label:(0,r.__)("All orders","woocommerce"),value:"all"},{label:(0,r.__)("Advanced filters","woocommerce"),value:"advanced"}]}]),m=(0,c.applyFilters)("woocommerce_admin_orders_report_advanced_filters",{title:(0,r._x)("Orders match <select/> filters","A sentence describing filters for Orders. See screen shot for context: https://cloudup.com/cSsUY9VeCVJ","woocommerce"),filters:{status:{labels:{add:(0,r.__)("Order status","woocommerce"),remove:(0,r.__)("Remove order status filter","woocommerce"),rule:(0,r.__)("Select an order status filter match","woocommerce"),title:(0,r.__)("<title>Order status</title> <rule/> <filter/>","woocommerce"),filter:(0,r.__)("Select an order status","woocommerce")},rules:[{value:"is",label:(0,r._x)("Is","order status","woocommerce")},{value:"is_not",label:(0,r._x)("Is Not","order status","woocommerce")}],input:{component:"SelectControl",options:Object.keys(l.rq).map((e=>({value:e,label:l.rq[e]})))}},product:{labels:{add:(0,r.__)("Product","woocommerce"),placeholder:(0,r.__)("Search products","woocommerce"),remove:(0,r.__)("Remove product filter","woocommerce"),rule:(0,r.__)("Select a product filter match","woocommerce"),title:(0,r.__)("<title>Product</title> <rule/> <filter/>","woocommerce"),filter:(0,r.__)("Select products","woocommerce")},rules:[{value:"includes",label:(0,r._x)("Includes","products","woocommerce")},{value:"excludes",label:(0,r._x)("Excludes","products","woocommerce")}],input:{component:"Search",type:"products",getLabels:a.oC}},variation:{labels:{add:(0,r.__)("Product variation","woocommerce"),placeholder:(0,r.__)("Search product variations","woocommerce"),remove:(0,r.__)("Remove product variation filter","woocommerce"),rule:(0,r.__)("Select a product variation filter match","woocommerce"),title:(0,r.__)("<title>Product variation</title> <rule/> <filter/>","woocommerce"),filter:(0,r.__)("Select variation","woocommerce")},rules:[{value:"includes",label:(0,r._x)("Includes","variations","woocommerce")},{value:"excludes",label:(0,r._x)("Excludes","variations","woocommerce")}],input:{component:"Search",type:"variations",getLabels:a.uC}},coupon:{labels:{add:(0,r.__)("Coupon code","woocommerce"),placeholder:(0,r.__)("Search coupons","woocommerce"),remove:(0,r.__)("Remove coupon filter","woocommerce"),rule:(0,r.__)("Select a coupon filter match","woocommerce"),title:(0,r.__)("<title>Coupon code</title> <rule/> <filter/>","woocommerce"),filter:(0,r.__)("Select coupon codes","woocommerce")},rules:[{value:"includes",label:(0,r._x)("Includes","coupon code","woocommerce")},{value:"excludes",label:(0,r._x)("Excludes","coupon code","woocommerce")}],input:{component:"Search",type:"coupons",getLabels:a.hQ}},customer_type:{labels:{add:(0,r.__)("Customer type","woocommerce"),remove:(0,r.__)("Remove customer filter","woocommerce"),rule:(0,r.__)("Select a customer filter match","woocommerce"),title:(0,r.__)("<title>Customer is</title> <filter/>","woocommerce"),filter:(0,r.__)("Select a customer type","woocommerce")},input:{component:"SelectControl",options:[{value:"new",label:(0,r.__)("New","woocommerce")},{value:"returning",label:(0,r.__)("Returning","woocommerce")}],defaultOption:"new"}},refunds:{labels:{add:(0,r.__)("Refund","woocommerce"),remove:(0,r.__)("Remove refund filter","woocommerce"),rule:(0,r.__)("Select a refund filter match","woocommerce"),title:(0,r.__)("<title>Refund</title> <filter/>","woocommerce"),filter:(0,r.__)("Select a refund type","woocommerce")},input:{component:"SelectControl",options:[{value:"all",label:(0,r.__)("All","woocommerce")},{value:"partial",label:(0,r.__)("Partially refunded","woocommerce")},{value:"full",label:(0,r.__)("Fully refunded","woocommerce")},{value:"none",label:(0,r.__)("None","woocommerce")}],defaultOption:"all"}},tax_rate:{labels:{add:(0,r.__)("Tax rate","woocommerce"),placeholder:(0,r.__)("Search tax rates","woocommerce"),remove:(0,r.__)("Remove tax rate filter","woocommerce"),rule:(0,r.__)("Select a tax rate filter match","woocommerce"),title:(0,r.__)("<title>Tax Rate</title> <rule/> <filter/>","woocommerce"),filter:(0,r.__)("Select tax rates","woocommerce")},rules:[{value:"includes",label:(0,r._x)("Includes","tax rate","woocommerce")},{value:"excludes",label:(0,r._x)("Excludes","tax rate","woocommerce")}],input:{component:"Search",type:"taxes",getLabels:a.FI}},attribute:{allowMultiple:!0,labels:{add:(0,r.__)("Product attribute","woocommerce"),placeholder:(0,r.__)("Search product attributes","woocommerce"),remove:(0,r.__)("Remove product attribute filter","woocommerce"),rule:(0,r.__)("Select a product attribute filter match","woocommerce"),title:(0,r.__)("<title>Product attribute</title> <rule/> <filter/>","woocommerce"),filter:(0,r.__)("Select attributes","woocommerce")},rules:[{value:"is",label:(0,r._x)("Is","product attribute","woocommerce")},{value:"is_not",label:(0,r._x)("Is Not","product attribute","woocommerce")}],input:{component:"ProductAttribute"}}}})},9863:(e,o,t)=>{t.r(o),t.d(o,{default:()=>C});var r=t(69307),c=t(69596),a=t.n(c),l=t(65736),s=t(84384),n=t(67327),m=t(92819),i=t(86020),u=t(81595),d=t(10431),_=t(81921),p=t(17844),w=t(66777),b=t(91978),h=t(81514);class f extends r.Component{constructor(){super(),this.getHeadersContent=this.getHeadersContent.bind(this),this.getRowsContent=this.getRowsContent.bind(this),this.getSummary=this.getSummary.bind(this)}getHeadersContent(){return[{label:(0,l.__)("Date","woocommerce"),key:"date",required:!0,defaultSort:!0,isLeftAligned:!0,isSortable:!0},{label:(0,l.__)("Order #","woocommerce"),screenReaderLabel:(0,l.__)("Order Number","woocommerce"),key:"order_number",required:!0},{label:(0,l.__)("Status","woocommerce"),key:"status",required:!1,isSortable:!1},{label:(0,l.__)("Customer","woocommerce"),key:"customer_id",required:!1,isSortable:!1},{label:(0,l.__)("Customer type","woocommerce"),key:"customer_type",required:!1,isSortable:!1},{label:(0,l.__)("Product(s)","woocommerce"),screenReaderLabel:(0,l.__)("Products","woocommerce"),key:"products",required:!1,isSortable:!1},{label:(0,l.__)("Items sold","woocommerce"),key:"num_items_sold",required:!1,isSortable:!0,isNumeric:!0},{label:(0,l.__)("Coupon(s)","woocommerce"),screenReaderLabel:(0,l.__)("Coupons","woocommerce"),key:"coupons",required:!1,isSortable:!1},{label:(0,l.__)("Net sales","woocommerce"),screenReaderLabel:(0,l.__)("Net sales","woocommerce"),key:"net_total",required:!0,isSortable:!0,isNumeric:!0},{label:(0,l.__)("Attribution","woocommerce"),screenReaderLabel:(0,l.__)("Attribution","woocommerce"),key:"attribution",required:!1,isSortable:!1}]}getCustomerName(e){const{first_name:o,last_name:t}=e||{};return o||t?[o,t].join(" "):""}getRowsContent(e){const{query:o}=this.props,t=(0,d.getPersistedQuery)(o),r=(0,b.O3)("dateFormat",_.defaultTableDateFormat),{render:c,getCurrencyConfig:a}=this.context;return(0,m.map)(e,(e=>{const{currency:o,date:s,net_total:n,num_items_sold:m,order_id:_,order_number:p,parent_id:w,status:f,customer_type:y}=e,v=e.extended_info||{},{coupons:g,customer:S,products:x}=v,C=x.sort(((e,o)=>o.quantity-e.quantity)).map((e=>({label:e.name,quantity:e.quantity,href:(0,d.getNewPath)(t,"/analytics/products",{filter:"single_product",products:e.id})}))),k=g.map((e=>({label:e.code,href:(0,d.getNewPath)(t,"/analytics/coupons",{filter:"single_coupon",coupons:e.id})})));return[{display:(0,h.jsx)(i.Date,{date:s,visibleFormat:r}),value:s},{display:(0,h.jsx)(i.Link,{href:"post.php?post="+(w||_)+"&action=edit"+(w?"#order_refunds":""),type:"wp-admin",children:p}),value:p},{display:(0,h.jsx)(i.OrderStatus,{className:"woocommerce-orders-table__status",order:{status:f},labelPositionToLeft:!0,orderStatusMap:(0,b.O3)("orderStatuses",{})}),value:f},{display:this.getCustomerName(S),value:this.getCustomerName(S)},{display:(A=y,A.charAt(0).toUpperCase()+A.slice(1)),value:y},{display:this.renderList(C.length?[C[0]]:[],C.map((e=>({label:(0,l.sprintf)((0,l.__)("%1$s× %2$s","woocommerce"),e.quantity,e.label),href:e.href})))),value:C.map((({quantity:e,label:o})=>(0,l.sprintf)((0,l.__)("%1$s× %2$s","woocommerce"),e,o))).join(", ")},{display:(0,u.formatValue)(a(),"number",m),value:m},{display:this.renderList(k.length?[k[0]]:[],k),value:k.map((e=>e.label)).join(", ")},{display:c(n,o),value:n},{display:v.attribution.origin,value:v.attribution.origin}];var A}))}getSummary(e){const{orders_count:o=0,total_customers:t=0,products:r=0,num_items_sold:c=0,coupons_count:a=0,net_revenue:s=0}=e,{formatAmount:n,getCurrencyConfig:m}=this.context,i=m();return[{label:(0,l._n)("Order","Orders",o,"woocommerce"),value:(0,u.formatValue)(i,"number",o)},{label:(0,l._n)(" Customer"," Customers",t,"woocommerce"),value:(0,u.formatValue)(i,"number",t)},{label:(0,l._n)("Product","Products",r,"woocommerce"),value:(0,u.formatValue)(i,"number",r)},{label:(0,l._n)("Item sold","Items sold",c,"woocommerce"),value:(0,u.formatValue)(i,"number",c)},{label:(0,l._n)("Coupon","Coupons",a,"woocommerce"),value:(0,u.formatValue)(i,"number",a)},{label:(0,l.__)("net sales","woocommerce"),value:n(s)}]}renderLinks(e=[]){return e.map(((e,o)=>(0,h.jsx)(i.Link,{href:e.href,type:"wc-admin",children:e.label},o)))}renderList(e,o){return(0,h.jsxs)(r.Fragment,{children:[this.renderLinks(e),o.length>1&&(0,h.jsx)(i.ViewMoreList,{items:this.renderLinks(o)})]})}render(){const{query:e,filters:o,advancedFilters:t}=this.props;return(0,h.jsx)(w.Z,{endpoint:"orders",getHeadersContent:this.getHeadersContent,getRowsContent:this.getRowsContent,getSummary:this.getSummary,summaryFields:["orders_count","total_customers","products","num_items_sold","coupons_count","net_revenue"],query:e,tableQuery:{extended_info:!0},title:(0,l.__)("Orders","woocommerce"),columnPrefsKey:"orders_report_columns",filters:o,advancedFilters:t})}}f.contextType=p.CurrencyContext;const y=f;var v=t(62671),g=t(17853),S=t(56739),x=t(70522);class C extends r.Component{render(){const{path:e,query:o}=this.props;return(0,h.jsxs)(r.Fragment,{children:[(0,h.jsx)(S.Z,{query:o,path:e,filters:s.u8,advancedFilters:s.be,report:"orders"}),(0,h.jsx)(g.Z,{charts:s.O3,endpoint:"orders",query:o,selectedChart:(0,n.Z)(o.chart,s.O3),filters:s.u8,advancedFilters:s.be}),(0,h.jsx)(v.Z,{charts:s.O3,endpoint:"orders",path:e,query:o,selectedChart:(0,n.Z)(o.chart,s.O3),filters:s.u8,advancedFilters:s.be}),(0,h.jsx)(y,{query:o,filters:s.u8,advancedFilters:s.be}),(0,h.jsx)(x.I,{optionName:"woocommerce_orders_report_date_tour_shown",headingText:(0,l.__)("Orders are now reported based on the payment dates ✅","woocommerce")})]})}}C.propTypes={path:a().string.isRequired,query:a().object.isRequired}},22575:(e,o,t)=>{t.d(o,{I:()=>c});var r=t(65736);function c(e){return[e.country,e.state,e.name||(0,r.__)("TAX","woocommerce"),e.priority].map((e=>e.toString().toUpperCase().trim())).filter(Boolean).join("-")}},70522:(e,o,t)=>{t.d(o,{I:()=>u});var r=t(86020),c=t(65736),a=t(67221),l=t(69307),s=t(9818),n=t(74617),m=t(81514);const i="woocommerce_date_type",u=({optionName:e,headingText:o})=>{const[t,u]=(0,l.useState)(!1),{updateOptions:d}=(0,s.useDispatch)(a.optionsStore),{shouldShowTour:_,isResolving:p}=(0,s.useSelect)((o=>{const{getOption:t,hasFinishedResolution:r}=o(a.optionsStore);return{shouldShowTour:"yes"!==t(e)&&!1===t(i),isResolving:!r("getOption",[e])||!r("getOption",[i])}}),[e]);if(t||!_||p)return null;const w={steps:[{referenceElements:{desktop:".woocommerce-filters-filter > .components-dropdown"},focusElement:{desktop:".woocommerce-filters-filter > .components-dropdown"},meta:{name:"product-feedback-",heading:o,descriptions:{desktop:(0,l.createInterpolateElement)((0,c.__)("We now collect orders in this table based on when the payment went through, rather than when they were placed. You can change this in <link>settings</link>.","woocommerce"),{link:(0,l.createElement)("a",{href:(0,n.getAdminLink)("admin.php?page=wc-admin&path=/analytics/settings"),"aria-label":(0,c.__)("Analytics date settings","woocommerce")})})},primaryButton:{text:(0,c.__)("Got it","woocommerce")}},options:{classNames:{desktop:"woocommerce-revenue-report-date-tour"}}}],closeHandler:()=>{d({[e]:"yes"}),u(!0)}};return(0,m.jsx)(r.TourKit,{config:w})}},45719:(e,o,t)=>{t.d(o,{FI:()=>h,V1:()=>f,YC:()=>_,hQ:()=>p,jk:()=>w,oC:()=>b,qc:()=>d,uC:()=>y});var r=t(65736),c=t(96483),a=t(86989),l=t.n(a),s=t(92819),n=t(10431),m=t(67221),i=t(22575),u=t(91978);function d(e,o=s.identity){return function(t="",r){const a="function"==typeof e?e(r):e,s=(0,n.getIdsFromQuery)(t);if(s.length<1)return Promise.resolve([]);const m={include:s.join(","),per_page:s.length};return l()({path:(0,c.addQueryArgs)(a,m)}).then((e=>e.map(o)))}}d(m.NAMESPACE+"/products/attributes",(e=>({key:e.id,label:e.name})));const _=d(m.NAMESPACE+"/products/categories",(e=>({key:e.id,label:e.name}))),p=d(m.NAMESPACE+"/coupons",(e=>({key:e.id,label:e.code}))),w=d(m.NAMESPACE+"/customers",(e=>({key:e.id,label:e.name}))),b=d(m.NAMESPACE+"/products",(e=>({key:e.id,label:e.name}))),h=d(m.NAMESPACE+"/taxes",(e=>({key:e.id,label:(0,i.I)(e)})));function f({attributes:e,name:o}){const t=(0,u.O3)("variationTitleAttributesSeparator"," - ");if(o&&o.indexOf(t)>-1)return o;const c=(e||[]).map((({name:e,option:o})=>(o||(e=e.charAt(0).toUpperCase()+e.slice(1),o=(0,r.sprintf)((0,r.__)("Any %s","woocommerce"),e)),o))).join(", ");return c?o+t+c:o}const y=d((({products:e})=>e?m.NAMESPACE+`/products/${e}/variations`:m.NAMESPACE+"/variations"),(e=>({key:e.id,label:f(e)})))}}]);