!function t(e,o,n){function i(s,a){if(!o[s]){if(!e[s]){var l="function"==typeof require&&require;if(!a&&l)return l(s,!0);if(r)return r(s,!0);var c=new Error("Cannot find module '"+s+"'");throw c.code="MODULE_NOT_FOUND",c}var u=o[s]={exports:{}};e[s][0].call(u.exports,function(t){var o=e[s][1][t];return i(o?o:t)},u,u.exports,t,e,o,n)}return o[s].exports}for(var r="function"==typeof require&&require,s=0;s<n.length;s++)i(n[s]);return i}({1:[function(t,e,o){(function(){var t;t=function(){function t(t,e){var o,n;if(this.options={target:"instafeed",get:"popular",resolution:"thumbnail",sortBy:"none",links:!0,mock:!1,useHttp:!1},"object"==typeof t)for(o in t)n=t[o],this.options[o]=n;this.context=null!=e?e:this,this.unique=this._genKey()}return t.prototype.hasNext=function(){return"string"==typeof this.context.nextUrl&&this.context.nextUrl.length>0},t.prototype.next=function(){return!!this.hasNext()&&this.run(this.context.nextUrl)},t.prototype.run=function(e){var o,n,i;if("string"!=typeof this.options.clientId&&"string"!=typeof this.options.accessToken)throw new Error("Missing clientId or accessToken.");if("string"!=typeof this.options.accessToken&&"string"!=typeof this.options.clientId)throw new Error("Missing clientId or accessToken.");return null!=this.options.before&&"function"==typeof this.options.before&&this.options.before.call(this),"undefined"!=typeof document&&null!==document&&(i=document.createElement("script"),i.id="instafeed-fetcher",i.src=e||this._buildUrl(),o=document.getElementsByTagName("head"),o[0].appendChild(i),n="instafeedCache"+this.unique,window[n]=new t(this.options,this),window[n].unique=this.unique),!0},t.prototype.parse=function(t){var e,o,n,i,r,s,a,l,c,u,p,h,d,f,m,g,w,y,v,_,b,k,x,E,I,N,T,C,j,B,q,O,U;if("object"!=typeof t){if(null!=this.options.error&&"function"==typeof this.options.error)return this.options.error.call(this,"Invalid JSON data"),!1;throw new Error("Invalid JSON response")}if(200!==t.meta.code){if(null!=this.options.error&&"function"==typeof this.options.error)return this.options.error.call(this,t.meta.error_message),!1;throw new Error("Error from Instagram: "+t.meta.error_message)}if(0===t.data.length){if(null!=this.options.error&&"function"==typeof this.options.error)return this.options.error.call(this,"No images were returned from Instagram"),!1;throw new Error("No images were returned from Instagram")}if(null!=this.options.success&&"function"==typeof this.options.success&&this.options.success.call(this,t),this.context.nextUrl="",null!=t.pagination&&(this.context.nextUrl=t.pagination.next_url),"none"!==this.options.sortBy)switch(q="random"===this.options.sortBy?["","random"]:this.options.sortBy.split("-"),B="least"===q[0],q[1]){case"random":t.data.sort(function(){return.5-Math.random()});break;case"recent":t.data=this._sortBy(t.data,"created_time",B);break;case"liked":t.data=this._sortBy(t.data,"likes.count",B);break;case"commented":t.data=this._sortBy(t.data,"comments.count",B);break;default:throw new Error("Invalid option for sortBy: '"+this.options.sortBy+"'.")}if("undefined"!=typeof document&&null!==document&&this.options.mock===!1){if(g=t.data,j=parseInt(this.options.limit,10),null!=this.options.limit&&g.length>j&&(g=g.slice(0,j)),a=document.createDocumentFragment(),null!=this.options.filter&&"function"==typeof this.options.filter&&(g=this._filter(g,this.options.filter)),null!=this.options.template&&"string"==typeof this.options.template){for(c="",f="",_="",U=document.createElement("div"),p=0,I=g.length;p<I;p++){if(h=g[p],d=h.images[this.options.resolution],"object"!=typeof d)throw s="No image found for resolution: "+this.options.resolution+".",new Error(s);b=d.width,y=d.height,v="square",b>y&&(v="landscape"),b<y&&(v="portrait"),m=d.url,u=window.location.protocol.indexOf("http")>=0,u&&!this.options.useHttp&&(m=m.replace(/https?:\/\//,"//")),f=this._makeTemplate(this.options.template,{model:h,id:h.id,link:h.link,type:h.type,image:m,width:b,height:y,orientation:v,caption:this._getObjectProperty(h,"caption.text"),likes:h.likes.count,comments:h.comments.count,location:this._getObjectProperty(h,"location.name")}),c+=f}for(U.innerHTML=c,i=[],n=0,o=U.childNodes.length;n<o;)i.push(U.childNodes[n]),n+=1;for(x=0,N=i.length;x<N;x++)C=i[x],a.appendChild(C)}else for(E=0,T=g.length;E<T;E++){if(h=g[E],w=document.createElement("img"),d=h.images[this.options.resolution],"object"!=typeof d)throw s="No image found for resolution: "+this.options.resolution+".",new Error(s);m=d.url,u=window.location.protocol.indexOf("http")>=0,u&&!this.options.useHttp&&(m=m.replace(/https?:\/\//,"//")),w.src=m,this.options.links===!0?(e=document.createElement("a"),e.href=h.link,e.appendChild(w),a.appendChild(e)):a.appendChild(w)}if(O=this.options.target,"string"==typeof O&&(O=document.getElementById(O)),null==O)throw s='No element with id="'+this.options.target+'" on page.',new Error(s);O.appendChild(a),l=document.getElementsByTagName("head")[0],l.removeChild(document.getElementById("instafeed-fetcher")),k="instafeedCache"+this.unique,window[k]=void 0;try{delete window[k]}catch(M){r=M}}return null!=this.options.after&&"function"==typeof this.options.after&&this.options.after.call(this),!0},t.prototype._buildUrl=function(){var t,e,o;switch(t="https://api.instagram.com/v1",this.options.get){case"popular":e="media/popular";break;case"tagged":if(!this.options.tagName)throw new Error("No tag name specified. Use the 'tagName' option.");e="tags/"+this.options.tagName+"/media/recent";break;case"location":if(!this.options.locationId)throw new Error("No location specified. Use the 'locationId' option.");e="locations/"+this.options.locationId+"/media/recent";break;case"user":if(!this.options.userId)throw new Error("No user specified. Use the 'userId' option.");e="users/"+this.options.userId+"/media/recent";break;default:throw new Error("Invalid option for get: '"+this.options.get+"'.")}return o=t+"/"+e,o+=null!=this.options.accessToken?"?access_token="+this.options.accessToken:"?client_id="+this.options.clientId,null!=this.options.limit&&(o+="&count="+this.options.limit),o+="&callback=instafeedCache"+this.unique+".parse"},t.prototype._genKey=function(){var t;return t=function(){return(65536*(1+Math.random())|0).toString(16).substring(1)},""+t()+t()+t()+t()},t.prototype._makeTemplate=function(t,e){var o,n,i,r,s;for(n=/(?:\{{2})([\w\[\]\.]+)(?:\}{2})/,o=t;n.test(o);)r=o.match(n)[1],s=null!=(i=this._getObjectProperty(e,r))?i:"",o=o.replace(n,function(){return""+s});return o},t.prototype._getObjectProperty=function(t,e){var o,n;for(e=e.replace(/\[(\w+)\]/g,".$1"),n=e.split(".");n.length;){if(o=n.shift(),!(null!=t&&o in t))return null;t=t[o]}return t},t.prototype._sortBy=function(t,e,o){var n;return n=function(t,n){var i,r;return i=this._getObjectProperty(t,e),r=this._getObjectProperty(n,e),o?i>r?1:-1:i<r?1:-1},t.sort(n.bind(this)),t},t.prototype._filter=function(t,e){var o,n,i,r,s;for(o=[],n=function(t){if(e(t))return o.push(t)},i=0,s=t.length;i<s;i++)r=t[i],n(r);return o},t}(),function(t,o){return"function"==typeof define&&define.amd?define([],o):"object"==typeof e&&e.exports?e.exports=o():t.Instafeed=o()}(this,function(){return t})}).call(this)},{}],2:[function(t,e,o){"use strict";t("./modules/scroll"),t("./modules/insta"),t("./modules/header")},{"./modules/header":3,"./modules/insta":4,"./modules/scroll":5}],3:[function(t,e,o){"use strict";jQuery(document).ready(function(t){function e(t){c-t>p?n.removeClass(a):t-c>p&&t>h&&n.addClass(a)}function o(){u=t(window).scrollTop(),e(u),c=u,l=!1}var n=t(".header"),i=t(".primary-nav"),r=".hamburger",s="is-active",a="is-hidden",l=!1,c=0,u=0,p=10,h=150;n.on("click",r,function(t){t.preventDefault(),n.toggleClass(s),i.toggleClass(s)}),t(window).on("scroll",function(){l||(l=!0,window.requestAnimationFrame?requestAnimationFrame(o):setTimeout(o,250))}),t(window).on("scroll",function(){t(window).scrollTop()>80?t(".header").addClass("is-scroll"):t(".header").removeClass("is-scroll")})})},{}],4:[function(t,e,o){"use strict";function n(t){return t&&t.__esModule?t:{"default":t}}var i=t("instafeed.js"),r=n(i),s=new r["default"]({get:"user",userId:1073623,clienetId:"8fb025858cd442609d397a55aa7626e6",accessToken:"1073623.8fb0258.a23ff3e4b74a4c13a61564448649f61d",template:'<div class="insta__wrap"><a href="{{link}}" target="_blank"><div class="insta__photo" style="background-image: url({{image}})"></div><div class="insta__hover"><i class="fa fa-instagram insta__icon"></i></div></a></div>',resolution:"standard_resolution",limit:"8"});s.run()},{"instafeed.js":1}],5:[function(t,e,o){"use strict";jQuery(document).ready(function(t){t(window).scroll(function(){t(".scroll-down").css("opacity",1-t(window).scrollTop()/1e3),console.log(t(window).scrollTop())})})},{}]},{},[2]);
//# sourceMappingURL=bundle.js.map