import{G as p}from"./links.C7Z9vJvv.js";import{a as i}from"./addons.CFmx_7nM.js";import{R as m,a as u}from"./RequiresUpdate.r_OS97xi.js";import{C as _}from"./Index.BtYN_o8x.js";import{a as l}from"./Header.D6vKDXKE.js";import{o,c as s,x as d,C as f,m as g,l as h,v as x}from"./vue.esm-bundler.CWQFYt9y.js";import{_ as n}from"./_plugin-vue_export-helper.BN1snXvA.js";import k from"./Overview.DeSenNlX.js";import"./default-i18n.Bd0Z306Z.js";import"./helpers.DkJd815A.js";import"./upperFirst.DnE5bcuK.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.24fN1xMd.js";import"./RequiresUpdate.BFVwZkce.js";import"./license.QkKrD28L.js";import"./allowed.CZmS0DkB.js";/* empty css             */import"./params.B3T1WKlC.js";import"./Ellipse.DLIy0Fhb.js";import"./Caret.iRBf3wcH.js";import"./ScrollAndHighlight.D63bIT5R.js";import"./LogoGear.BF23BIEd.js";import"./Logo.DoVR4qom.js";import"./Support.B-t20u3s.js";import"./Tabs.C3JBuhlY.js";import"./TruSeoScore.TjofuHRQ.js";import"./Information.CESrgQJV.js";import"./Slide.CRIn0kdn.js";import"./Url.KGrLSVBd.js";import"./Date.wJe5sKwv.js";import"./constants.DpuIWwJ9.js";import"./Exclamation.DKtT8kuH.js";import"./Gear.aQH8e4fl.js";import"./AnimatedNumber.D3vhSMTe.js";import"./numbers.zAmItkHM.js";import"./index.B8uZtLiV.js";import"./AddonConditions.DbcWzjSi.js";import"./Index.XNbBlAFo.js";import"./Row.CzuhYwfs.js";import"./Blur.DNVDismY.js";import"./Card.CGaKNDqF.js";import"./Tooltip.Jp05nfCy.js";import"./InternalOutbound.C_4tKmQU.js";import"./DonutChartWithLegend.C8x48JXe.js";import"./SeoSiteScore.CODmf9vA.js";import"./Row.DMGP3siA.js";import"./RequiredPlans.5f41kq6X.js";const $={};function v(t,r){return o(),s("div")}const A=n($,[["render",v]]),b={};function S(t,r){return o(),s("div")}const y=n(b,[["render",S]]),C={};function R(t,r){return o(),s("div")}const T=n(C,[["render",R]]),w={};function L(t,r){return o(),s("div")}const P=n(w,[["render",L]]),B={setup(){return{linkAssistantStore:p()}},components:{CoreMain:_,CoreProcessingPopup:l,DomainsReport:A,LinksReport:y,Overview:k,PostReport:T,Settings:P},mixins:[m,u],data(){return{strings:{pageName:this.$t.__("Link Assistant",this.$td)}}},computed:{excludedTabs(){const t=(i.isActive("aioseo-link-assistant")?this.getExcludedUpdateTabs("aioseo-link-assistant"):this.getExcludedActivationTabs("aioseo-link-assistant"))||[];return t.push("post-report"),t}},mounted(){window.aioseoBus.$on("changes-saved",()=>{this.linkAssistantStore.getMenuData()}),this.$isPro&&this.linkAssistantStore.suggestionsScan.percent!==100&&i.isActive("aioseo-link-assistant")&&!i.requiresUpgrade("aioseo-link-assistant")&&i.hasMinimumVersion("aioseo-link-assistant")&&this.linkAssistantStore.pollSuggestionsScan()}},M={class:"aioseo-link-assistant"};function U(t,r,q,D,e,a){const c=d("core-main");return o(),s("div",M,[f(c,{"page-name":e.strings.pageName,"exclude-tabs":a.excludedTabs,showTabs:t.$route.name!=="post-report"},{default:g(()=>[(o(),h(x(t.$route.name)))]),_:1},8,["page-name","exclude-tabs","showTabs"])])}const Lt=n(B,[["render",U]]);export{Lt as default};
