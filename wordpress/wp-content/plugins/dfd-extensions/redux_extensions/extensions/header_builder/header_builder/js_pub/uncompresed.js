/*global Backbone */
var dfd_header_b = dfd_header_b || {};

(function($, window){
	'use strict';

	dfd_header_b.Config = {
		curentView: "desktop",
		curentPreset: "",
		PresetName: "Default",
		isnew: false,
		defaultView: {
			desktop: '',
			tablet: '',
			mobile: '',
		},
		editView: {
			desktop: "",
			tablet: "",
			mobile: "",
		},
		settings: {
			desktop: "",
			tablet: "",
			mobile: "",
		},
		globalSetting: "",
		getCurrentSetting: function(){
			var view = this.getCurentView();
			return this.settings[view];
		},
		getCurentPresetName: function(){
			var model = dfd_header_b.APP.presets.findWhere({isActive: "active"});
			if(_.isObject(model)){
				return model.get("name");
			}
			return "";
		},
		getCurrentPreset: function(){
			var view = this.getCurentView();
			return this.defaultView[view];
		},
		getCurentView: function(){
			return this.curentView;
		},
		setDesktopView: function(){
			this.curentView = "desktop";
		},
		setTabletView: function(){
			this.curentView = "tablet";
		},
		setMobileView: function(){
			this.curentView = "mobile";
		},
		setPresetState: function(){
			var findpreset = dfd_header_b.APP.presets.findWhere({isActive: "active", isDefault: false});

			if(_.isObject(findpreset)){
				findpreset.set(
						{
							settings: {
								desktop: this.settings.desktop,
								tablet: this.settings.tablet,
								mobile: this.settings.mobile,
								globals: this.globalSetting
							}
						}
				), {merge: false};
			}

		},
		setPreset: function(preset){
			this.defaultView.desktop = preset.desktop;
			this.defaultView.tablet = preset.tablet;
			this.defaultView.mobile = preset.mobile;
		},
		setSetting: function(preset){
			this.settings.desktop = preset.desktop;
			this.settings.tablet = preset.tablet;
			this.settings.mobile = preset.mobile;
			this.globalSetting = preset.globals;
		},
		setSettingByView: function(setting){
			var view = this.getCurentView();
			this.settings[view] = setting;
		},
		setGlobalSetting: function(global){
			this.globalSetting = global;
		},
		getGlobalSetting: function(){
			return this.globalSetting;
		},
		setPresetByView: function(preset){
			var view = this.getCurentView();
			this.defaultView[view] = preset;
			if(this.getCurentPresetName() == ""){
				this.editView[view] = preset;
			} else {
				this.clearEditView();
			}
			var findpreset = dfd_header_b.APP.presets.findWhere({isActive: "active", isDefault: false});
			var curview = this.getCurentView();
			var paste = this.defaultView;

			/*For Update*/
			if(_.isObject(findpreset)){
				findpreset.set(
						{
							presetValues: {
								desktop: this.defaultView.desktop,
								tablet: this.defaultView.tablet,
								mobile: this.defaultView.mobile,
							},
							settings: {
								desktop: this.settings.desktop,
								tablet: this.settings.tablet,
								mobile: this.settings.mobile,
								globals: this.globalSetting
							}
						}
				);
			}
		},
		clearTopPanel: function(){
		},
		clearMidPanel: function(){
		},
		clearBotPanel: function(){
			var $preset = this.getCurrentPreset();
			$preset[2] = [
			];
			this.setPresetByView($preset);
		},
		clearEditView: function(){
			this.editView = {
				desktop: "",
				tablet: "",
				mobile: ""
			};
		},
		clearSetting: function(){
			this.settings = {
				desktop: "",
				tablet: "", mobile: ""
			};
			this.globalSetting = "";
		},
		clearView: function(){
			this.defaultView = {
				desktop: "",
				tablet: "",
				mobile: ""
			};
		}
	};
})(jQuery, window);

/*global Backbone */
var dfd_header_b = dfd_header_b || {};

(function($, window){
	'use strict';

	dfd_header_b.Default = {
		"name": "defalult_03223",
		"isActive": "active",
		"presetValues": {
			"desktop": [
				[
					[
					],
					[
					],
					[
					]
				],
				[
					[
					],
					[
					],
					[
					]
				],
				[
					[
					],
					[
					],
					[
					]
				]
			],
			"tablet": [
				[
					[
					],
					[
					],
					[
					]
				],
				[
					[
					],
					[
					],
					[
					]
				],
				[
					[
						{"name": "Logo", "type": "logo", "isfullwidth": false}
					],
					[
					],
					[
						{"name": "Language", "type": "language", "isfullwidth": false},
						{"name": "Search", "type": "search", "isfullwidth": false},
						{"name": "Cart", "type": "cart", "isfullwidth": false},
						{"name": "Mobile Menu", "type": "mobile_menu", "isfullwidth": false}
					]
				]
			],
			"mobile": [
				[
					[
					],
					[
					],
					[
					]
				],
				[
					[
					],
					[
					],
					[
					]
				],
				[
					[
						{"name": "Logo", "type": "logo", "isfullwidth": false}
					],
					[
					],
					[
						{"name": "Delimiter", "type": "delimiter", "isfullwidth": false},
						{"name": "Language", "type": "language", "isfullwidth": false},
						{"name": "Mobile Menu", "type": "mobile_menu", "isfullwidth": false}
					]
				]
			]},
		"settings": {
			"desktop": [
			],
			"tablet": [
				{"id": "show_top_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"},
				{"id": "show_mid_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"},
				{"id": "show_bot_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"},
			],
			"mobile": [
				{"id": "show_top_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"},
				{"id": "show_mid_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"},
				{"id": "show_bot_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"},
			],
			"globals": [
			]}, "active": ""};
	/** 
	 * Default preset for side header
	 */
	dfd_header_b.DefaultPresetSide = {
		"name": "default_343434343",
		"isActive": "",
		"presetValues": {
			"desktop": [[[{"name": "Spacer", "type": "spacer", "isfullwidth": false}, {"name": "Spacer", "type": "spacer", "isfullwidth": false}], [], []], [[], [], []], [[{"name": "Spacer", "type": "spacer", "isfullwidth": false}, {"name": "Spacer", "type": "spacer", "isfullwidth": false}], [], []]], "tablet": [[[], [], []], [[], [], []], [[{"name": "Logo", "type": "logo", "isfullwidth": false}], [], [{"name": "Language", "type": "language", "isfullwidth": false}, {"name": "Search", "type": "search", "isfullwidth": false}, {"name": "Cart", "type": "cart", "isfullwidth": false}, {"name": "Mobile Menu", "type": "mobile_menu", "isfullwidth": false}]]], "mobile": [[[], [], []], [[], [], []], [[{"name": "Logo", "type": "logo", "isfullwidth": false}], [], [{"name": "Delimiter", "type": "delimiter", "isfullwidth": false}, {"name": "Language", "type": "language", "isfullwidth": false}, {"name": "Mobile Menu", "type": "mobile_menu", "isfullwidth": false}]]]
		},
		"settings": {
			"desktop": [{"id": "show_top_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"}, {"id": "show_mid_panel_builder", "type": "trigger", "value": "on", "def": "on", "isGlobal": "false"}, {"id": "show_bot_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"}, {"id": "set_top_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "set_mid_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "set_bot_panel_abstract_builder", "type": "trigger", "value": "on", "def": "off", "isGlobal": "false"}, {"id": "header_top_background_color_build", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "false"}, {"id": "header_mid_background_color_build", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "false"}, {"id": "header_bot_background_color_build", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "false"}, {"id": "header_top_text_color_build", "type": "colorpicker", "value": "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}", "def": "#313131", "isGlobal": "false", "hidetransparent": "true"}, {"id": "header_mid_text_color_build", "type": "colorpicker", "value": "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}", "def": "#313131", "isGlobal": "false", "hidetransparent": "true"}, {"id": "header_bot_text_color_build", "type": "colorpicker", "value": "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}", "def": "#313131", "isGlobal": "false", "hidetransparent": "true"}, {"id": "header_border_color_build", "type": "colorpicker", "value": "{ \"color\":\"#e7e7e7\",\"is_transparent\":\"false\"}", "def": "#e7e7e7", "isGlobal": "false"}], "tablet": [{"id": "show_top_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_mid_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_bot_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"}, {"id": "set_top_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "set_mid_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "set_bot_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}], "mobile": [{"type": "trigger", "id": "show_top_panel_builder", "value": "off", "def": "on", "isGlobal": "false"}, {"type": "trigger", "id": "show_mid_panel_builder", "value": "off", "def": "on", "isGlobal": "false"}, {"type": "trigger", "id": "show_bot_panel_builder", "value": "", "def": "on", "isGlobal": "false"}, {"type": "trigger", "id": "set_top_panel_abstract_builder", "value": "", "def": "off", "isGlobal": "false"}, {"type": "trigger", "id": "set_mid_panel_abstract_builder", "value": "", "def": "off", "isGlobal": "false"}, {"type": "trigger", "id": "set_bot_panel_abstract_builder", "value": "", "def": "off", "isGlobal": "false"}], "globals": [{"id": "header_copyright_builder", "type": "text", "value": "@DFD", "def": "", "isGlobal": "true"}, {"id": "header_telephone_builder", "type": "telephone", "value": "+(032) 323-323-32", "def": "", "isGlobal": "true"}, {"id": "header_button_text_builder", "type": "text", "value": "Button", "def": "", "isGlobal": "true"}, {"id": "header_button_url_builder", "type": "text", "value": "#", "def": "", "isGlobal": "true"}, {"id": "header_side_background_color_builder", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "true"}, {"id": "bg_image_side_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "header_side_bar_width_builder", "type": "slider", "value": "320", "def": "", "isGlobal": "true"}, {"id": "header_alignment_builder", "type": "radio", "value": "left", "def": "", "isGlobal": "true"}, {"id": "header_bg_repeat_builder", "type": "radio", "value": "no-repeat", "def": "", "isGlobal": "true"}, {"id": "header_bg_size_builder", "type": "radio", "value": "cover", "def": "", "isGlobal": "true"}, {"id": "header_bg_position_builder", "type": "radio", "value": "center-center", "def": "", "isGlobal": "true"}, {"id": "header_content_alignment_builder", "type": "radio", "value": "alignleft", "def": "", "isGlobal": "true"}, {"id": "style_header_builder", "type": "image_select", "value": "side", "def": "", "isGlobal": "true"}, {"id": "logo_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "retina_logo_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "top_header_height_builder", "type": "slider", "value": "40", "def": "", "isGlobal": "true"}, {"id": "mid_header_height_builder", "type": "slider", "value": "40", "def": "", "isGlobal": "true"}, {"id": "bot_header_height_builder", "type": "slider", "value": "70", "def": "", "isGlobal": "true"}, {"id": "header_sticky_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "true"}]
		},
	};
	/** 
	 * Default preset for boxed header
	 */
	dfd_header_b.DefaultPresetBoxed = {
		"name": "default_478368",
		"isActive": "",
		"presetValues": {
			"desktop": [[[], [], []], [[], [], []], [[], [], []]], "tablet": [[[], [], []], [[], [], []], [[{"name": "Logo", "type": "logo", "isfullwidth": false}], [], [{"name": "Language", "type": "language", "isfullwidth": false}, {"name": "Search", "type": "search", "isfullwidth": false}, {"name": "Cart", "type": "cart", "isfullwidth": false}, {"name": "Mobile Menu", "type": "mobile_menu", "isfullwidth": false}]]], "mobile": [[[], [], []], [[], [], []], [[{"name": "Logo", "type": "logo", "isfullwidth": false}], [], [{"name": "Delimiter", "type": "delimiter", "isfullwidth": false}, {"name": "Language", "type": "language", "isfullwidth": false}, {"name": "Mobile Menu", "type": "mobile_menu", "isfullwidth": false}]]]},
		"settings": {
			"desktop": [{"id": "header_copyright_builder", "type": "text", "value": "@DFD", "def": "", "isGlobal": "true"}, {"id": "header_telephone_builder", "type": "telephone", "value": "+(032) 323-323-32", "def": "", "isGlobal": "true"}, {"id": "header_button_text_builder", "type": "text", "value": "Button", "def": "", "isGlobal": "true"}, {"id": "header_button_url_builder", "type": "text", "value": "#", "def": "", "isGlobal": "true"}, {"id": "header_side_background_color_builder", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "true"}, {"id": "bg_image_side_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "header_side_bar_width_builder", "type": "slider", "value": "490", "def": "", "isGlobal": "true"}, {"id": "header_alignment_builder", "type": "radio", "value": "left", "def": "", "isGlobal": "true"}, {"id": "header_bg_repeat_builder", "type": "radio", "value": "no-repeat", "def": "", "isGlobal": "true"}, {"id": "header_bg_size_builder", "type": "radio", "value": "cover", "def": "", "isGlobal": "true"}, {"id": "header_bg_position_builder", "type": "radio", "value": "center-center", "def": "", "isGlobal": "true"}, {"id": "header_content_alignment_builder", "type": "radio", "value": "alignleft", "def": "", "isGlobal": "true"}, {"id": "style_header_builder", "type": "image_select", "value": "horizontal", "def": "", "isGlobal": "true"}, {"id": "show_top_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_mid_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_bot_panel_builder", "type": "trigger", "value": "on", "def": "on", "isGlobal": "false"}, {"id": "set_top_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "set_mid_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "set_bot_panel_abstract_builder", "type": "trigger", "value": "", "def": "off", "isGlobal": "false"}, {"id": "logo_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "retina_logo_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "top_header_height_builder", "type": "slider", "value": "40", "def": "", "isGlobal": "true"}, {"id": "mid_header_height_builder", "type": "slider", "value": "40", "def": "", "isGlobal": "true"}, {"id": "bot_header_height_builder", "type": "slider", "value": "70", "def": "", "isGlobal": "true"}, {"id": "header_top_background_color_build", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "false"}, {"id": "header_mid_background_color_build", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "false"}, {"id": "header_bot_background_color_build", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "false"}, {"id": "header_top_text_color_build", "type": "colorpicker", "value": "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}", "def": "#313131", "isGlobal": "false", "hidetransparent": "true"}, {"id": "header_mid_text_color_build", "type": "colorpicker", "value": "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}", "def": "#313131", "isGlobal": "false", "hidetransparent": "true"}, {"id": "header_bot_text_color_build", "type": "colorpicker", "value": "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}", "def": "#313131", "isGlobal": "false", "hidetransparent": "true"}, {"id": "header_border_color_build", "type": "colorpicker", "value": "{\"color\":\"transparent\",\"is_transparent\":\"true\"}", "def": "#e7e7e7", "isGlobal": "false"}, {"id": "header_sticky_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "true"}], "tablet": [{"id": "show_top_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_mid_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_bot_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"}], "mobile": [{"id": "show_top_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_mid_panel_builder", "type": "trigger", "value": "off", "def": "on", "isGlobal": "false"}, {"id": "show_bot_panel_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "false"}], "globals": [{"id": "header_copyright_builder", "type": "text", "value": "@DFD", "def": "", "isGlobal": "true"}, {"id": "header_telephone_builder", "type": "telephone", "value": "+(032) 323-323-32", "def": "", "isGlobal": "true"}, {"id": "header_button_text_builder", "type": "text", "value": "Button", "def": "", "isGlobal": "true"}, {"id": "header_button_url_builder", "type": "text", "value": "#", "def": "", "isGlobal": "true"}, {"id": "header_side_background_color_builder", "type": "colorpicker", "value": "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}", "def": "#ffffff", "isGlobal": "true"}, {"id": "bg_image_side_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "header_side_bar_width_builder", "type": "slider", "value": "490", "def": "", "isGlobal": "true"}, {"id": "header_alignment_builder", "type": "radio", "value": "left", "def": "", "isGlobal": "true"}, {"id": "header_bg_repeat_builder", "type": "radio", "value": "no-repeat", "def": "", "isGlobal": "true"}, {"id": "header_bg_size_builder", "type": "radio", "value": "cover", "def": "", "isGlobal": "true"}, {"id": "header_bg_position_builder", "type": "radio", "value": "center-center", "def": "", "isGlobal": "true"}, {"id": "header_content_alignment_builder", "type": "radio", "value": "alignleft", "def": "", "isGlobal": "true"}, {"id": "style_header_builder", "type": "image_select", "value": "boxed", "def": "", "isGlobal": "true"}, {"id": "logo_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "retina_logo_header_builder", "type": "image", "value": "{\"id\":\"\",\"thumb\":\"\"}", "def": "", "isGlobal": "true"}, {"id": "top_header_height_builder", "type": "slider", "value": "40", "def": "", "isGlobal": "true"}, {"id": "mid_header_height_builder", "type": "slider", "value": "40", "def": "", "isGlobal": "true"}, {"id": "bot_header_height_builder", "type": "slider", "value": "70", "def": "", "isGlobal": "true"}, {"id": "header_sticky_builder", "type": "trigger", "value": "", "def": "on", "isGlobal": "true"}]},
	};



	dfd_header_b.PreSetting = [
		{
			id: "header_copyright_builder",
			type: "text",
			value: "@DFD",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_telephone_builder",
			type: "telephone",
			value: "+(032) 323-323-32",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_button_text_builder",
			type: "text",
			value: "Button",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_button_url_builder",
			type: "text",
			value: "#",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_side_background_color_builder",
			type: "colorpicker",
			value: "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}",
			def: "#ffffff",
			isGlobal: "true"
		},
		{
			id: "bg_image_side_header_builder",
			type: "image",
			value: "{\"id\":\"\",\"thumb\":\"\"}",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_side_bar_width_builder",
			type: "slider",
			value: "490",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_alignment_builder",
			type: "radio",
			value: "left",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_bg_repeat_builder",
			type: "radio",
			value: "no-repeat",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_bg_size_builder",
			type: "radio",
			value: "cover",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_bg_position_builder",
			type: "radio",
			value: "center-center",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_content_alignment_builder",
			type: "radio",
			value: "alignleft",
			def: "",
			isGlobal: "true"
		},
		{
			id: "style_header_builder",
			type: "image_select",
			value: "horizontal",
			def: "",
			isGlobal: "true"
		},
		{
			id: "show_top_panel_builder",
			type: "trigger",
			value: "",
			def: "on",
			isGlobal: "false"
		},
		{
			id: "show_mid_panel_builder",
			type: "trigger",
			value: "",
			def: "on",
			isGlobal: "false"
		},
		{
			id: "show_bot_panel_builder",
			type: "trigger",
			value: "",
			def: "on",
			isGlobal: "false"
		},
		{
			id: "set_top_panel_abstract_builder",
			type: "trigger",
			value: "",
			def: "off",
			isGlobal: "false"
		},
		{
			id: "set_mid_panel_abstract_builder",
			type: "trigger",
			value: "",
			def: "off",
			isGlobal: "false"
		},
		{
			id: "set_bot_panel_abstract_builder",
			type: "trigger",
			value: "",
			def: "off",
			isGlobal: "false"
		},
		{
			id: "logo_header_builder",
			type: "image",
			value: "{\"id\":\"\",\"thumb\":\"" + dfd_header_b_local_settings.logo_url + "\"}",
			def: "",
			isGlobal: "true"
		},
		{
			id: "retina_logo_header_builder",
			type: "image",
			value: "{\"id\":\"\",\"thumb\":\"" + dfd_header_b_local_settings.retina_url + "\"}",
			def: "",
			isGlobal: "true"
		},
		{
			id: "top_header_height_builder",
			type: "slider",
			value: "40",
			def: "",
			isGlobal: "true"
		},
		{
			id: "mid_header_height_builder",
			type: "slider",
			value: "40",
			def: "",
			isGlobal: "true"
		},
		{
			id: "bot_header_height_builder",
			type: "slider",
			value: "70",
			def: "",
			isGlobal: "true"
		},
		{
			id: "header_top_background_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}",
			def: "#ffffff",
			isGlobal: "false"
		},
		{
			id: "header_mid_background_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}",
			def: "#ffffff",
			isGlobal: "false"
		},
		{
			id: "header_bot_background_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#ffffff\",\"is_transparent\":\"false\"}",
			def: "#ffffff",
			isGlobal: "false"
		},
		{
			id: "header_top_text_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}",
			def: "#313131",
			hidetransparent: "true",
			isGlobal: "false"
		},
		{
			id: "header_mid_text_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}",
			def: "#313131",
			hidetransparent: "true",
			isGlobal: "false"
		},
		{
			id: "header_bot_text_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#313131\",\"is_transparent\":\"false\"}",
			def: "#313131",
			hidetransparent: "true",
			isGlobal: "false"
		},
		{
			id: "header_border_color_build",
			type: "colorpicker",
			value: "{ \"color\":\"#e7e7e7\",\"is_transparent\":\"false\"}",
			def: "#e7e7e7",
			isGlobal: "false"
		},
		{
			id: "header_sticky_builder",
			type: "trigger",
			value: "",
			def: "on",
			isGlobal: "true"
		},
	];

	dfd_header_b.PremadeElements = {
		el: [
			{
				type: "text",
				name: "Copyright message",
				class_el: "Copyright-message"
			},
			{
				type: "menu",
				name: "Menu",
				class_el: "Menu"
			},
			{
				type: "second_menu",
				name: "Second Menu",
				class_el: "Second-Menu"
			},
			{
				type: "third_menu",
				name: "Third  Menu",
				class_el: "Third-Menu"
			},
			{
				type: "additional_menu",
				name: "Additional Menu",
				class_el: "Additional_Menu"},
			{
				type: "wishlist",
				name: "Wishlist",
				class_el: "Wishlist"
			},
			{
				type: "cart",
				name: "Cart",
				class_el: "Cart"
			},
			{
				type: "search",
				name: "Search",
				class_el: "Search"
			},
			{
				type: "logo",
				name: "Logo",
				class_el: "Logo"},
			{
				type: "language",
				name: "Language",
				class_el: "Language"
			},
			{
				type: "socicon",
				name: "Social Icon",
				class_el: "Socicon"
			},
			{
				type: "login",
				name: "Login on site",
				class_el: "Login"
			},
			{
				type: "info",
				name: "Info",
				class_el: "Info"
			},
			{
				type: "mobile_menu",
				name: "Mobile Menu",
				class_el: "Mobile_Menu"
			},
			{
				type: "side_area",
				name: "Side Area",
				class_el: "Side_Area"
			},
			{
				type: "inner_page",
				name: "Inner Page",
				class_el: "Inner_Page"
			},
			{
				type: "buttonel",
				name: "Button",
				class_el: "Button"
			},
			{
				type: "telephone",
				name: "Telephone",
				class_el: "Telephone"
			},
			{
				type: "spacer",
				name: "Spacer",
				class_el: "spacer",
				onlimit: true
			},
			{
				type: "delimiter",
				name: "Delimiter",
				class_el: "Delimiter",
				onlimit: true
			},
		]
	};

	dfd_header_b.Dependency = {
		side: [
			"set_top_panel_abstract_builder",
			"set_mid_panel_abstract_builder",
			"set_bot_panel_abstract_builder",
			"top_header_height_builder",
			"mid_header_height_builder",
			"bot_header_height_builder",
			"show_top_panel_builder",
			"show_mid_panel_builder",
			"show_bot_panel_builder",
			"header_top_background_color_build",
			"header_mid_background_color_build",
			"header_bot_background_color_build",
//			"header_sticky_builder",
		],
		horizontal: [
			"bg_image_side_header_builder",
			"header_side_background_color_builder",
			"header_side_bar_width_builder",
			"header_alignment_builder",
			"header_content_alignment_builder",
			"header_bg_repeat_builder",
			"header_bg_size_builder",
			"header_bg_position_builder",
		],
		boxed: [
			"bg_image_side_header_builder",
			"header_side_background_color_builder",
			"header_side_bar_width_builder",
			"header_alignment_builder",
			"header_content_alignment_builder",
			"header_bg_repeat_builder",
			"header_bg_size_builder",
			"header_bg_position_builder",
		],
		init: function(){
			var self = this;
			var type = dfd_header_b.View.Setting.getHeaderStyle();
			var curView = dfd_header_b.Config.getCurentView();
			if(curView != "desktop"){
				if(type == "side"){
					type = "horizontal";
				}
			}
			setTimeout(function(){
				self.build(type);
			}, 50);
		},
		build: function(type){
			for(var key in this[type]) {
				var id = this[type][key];
				var obj = $("fieldset[data-id=" + id + "]").parent().parent();
//				if(obj.is(":visible")){
				obj.hide();
//				}
			}
//			if(type == "side"){
//				type = "horizontal";
//			}			
			if(type == "side"){
				type = "horizontal";
			} else {
				type = "side";
			}
			for(var key in this[type]) {
				var id = this[type][key];
				var obj = $("fieldset[data-id=" + id + "]").parent().parent();
//				if(!obj.is(":visible")){
				obj.show();
//				}
			}
		}
	};
})(jQuery, window);

/**
 * $.disablescroll
 * Author: Josh Harrison - aloof.co
 *
 * Disables scroll events from mousewheels, touchmoves and keypresses.
 * Use while jQuery is animating the scroll position for a guaranteed super-smooth ride!
 */

(function($){

	"use strict";

	var instance, proto;

	function UserScrollDisabler($container, options){
		// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
		// left: 37, up: 38, right: 39, down: 40
		this.opts = $.extend({
			handleKeys: true,
			scrollEventKeys: [32, 33, 34, 35, 36, 37, 38, 39, 40]
		}, options);

		this.$container = $container;
		this.$document = $(document);
		this.lockToScrollPos = [0, 0];

		this.disable();
	}

	proto = UserScrollDisabler.prototype;

	proto.disable = function(){
		var t = this;

		t.lockToScrollPos = [
			t.$container.scrollLeft(),
			t.$container.scrollTop()
		];

		t.$container.on(
				"mousewheel.disablescroll DOMMouseScroll.disablescroll touchmove.disablescroll",
				t._handleWheel
				);

		t.$container.on("scroll.disablescroll", function(){
			t._handleScrollbar.call(t);
		});

		if(t.opts.handleKeys){
			t.$document.on("keydown.disablescroll", function(event){
				t._handleKeydown.call(t, event);
			});
		}
	};

	proto.undo = function(){
		var t = this;
		t.$container.off(".disablescroll");
		if(t.opts.handleKeys){
			t.$document.off(".disablescroll");
		}
	};

	proto._handleWheel = function(event){
		event.preventDefault();
	};

	proto._handleScrollbar = function(){
		this.$container.scrollLeft(this.lockToScrollPos[0]);
		this.$container.scrollTop(this.lockToScrollPos[1]);
	};

	proto._handleKeydown = function(event){
		for(var i = 0; i < this.opts.scrollEventKeys.length; i++) {
			if(event.keyCode === this.opts.scrollEventKeys[i]){
				event.preventDefault();
				return;
			}
		}
	};


	// Plugin wrapper for object
	$.fn.disablescroll = function(method){

		// If calling for the first time, instantiate the object and save
		// reference. The plugin can therefore only be instantiated once per
		// page. You can pass options object in through the method parameter.
		if(!instance && (typeof method === "object" || !method)){
			instance = new UserScrollDisabler(this, method);
		}

		// Instance already created, and a method is being explicitly called,
		// e.g. .disablescroll('undo');
		else if(instance && instance[method]){
			instance[method].call(instance);
		}

	};

	// Global access
	window.UserScrollDisabler = UserScrollDisabler;

})(jQuery);
/**!
 * Sortable 1.13.0
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global = global || self, global.Sortable = factory());
}(this, function () { 'use strict';

  function _typeof(obj) {
    if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
      _typeof = function (obj) {
        return typeof obj;
      };
    } else {
      _typeof = function (obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };
    }

    return _typeof(obj);
  }

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }

  function _extends() {
    _extends = Object.assign || function (target) {
      for (var i = 1; i < arguments.length; i++) {
        var source = arguments[i];

        for (var key in source) {
          if (Object.prototype.hasOwnProperty.call(source, key)) {
            target[key] = source[key];
          }
        }
      }

      return target;
    };

    return _extends.apply(this, arguments);
  }

  function _objectSpread(target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i] != null ? arguments[i] : {};
      var ownKeys = Object.keys(source);

      if (typeof Object.getOwnPropertySymbols === 'function') {
        ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) {
          return Object.getOwnPropertyDescriptor(source, sym).enumerable;
        }));
      }

      ownKeys.forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    }

    return target;
  }

  function _objectWithoutPropertiesLoose(source, excluded) {
    if (source == null) return {};
    var target = {};
    var sourceKeys = Object.keys(source);
    var key, i;

    for (i = 0; i < sourceKeys.length; i++) {
      key = sourceKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      target[key] = source[key];
    }

    return target;
  }

  function _objectWithoutProperties(source, excluded) {
    if (source == null) return {};

    var target = _objectWithoutPropertiesLoose(source, excluded);

    var key, i;

    if (Object.getOwnPropertySymbols) {
      var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

      for (i = 0; i < sourceSymbolKeys.length; i++) {
        key = sourceSymbolKeys[i];
        if (excluded.indexOf(key) >= 0) continue;
        if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
        target[key] = source[key];
      }
    }

    return target;
  }

  function _toConsumableArray(arr) {
    return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
  }

  function _arrayWithoutHoles(arr) {
    if (Array.isArray(arr)) {
      for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) arr2[i] = arr[i];

      return arr2;
    }
  }

  function _iterableToArray(iter) {
    if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
  }

  function _nonIterableSpread() {
    throw new TypeError("Invalid attempt to spread non-iterable instance");
  }

  var version = "1.13.0";

  function userAgent(pattern) {
    if (typeof window !== 'undefined' && window.navigator) {
      return !!
      /*@__PURE__*/
      navigator.userAgent.match(pattern);
    }
  }

  var IE11OrLess = userAgent(/(?:Trident.*rv[ :]?11\.|msie|iemobile|Windows Phone)/i);
  var Edge = userAgent(/Edge/i);
  var FireFox = userAgent(/firefox/i);
  var Safari = userAgent(/safari/i) && !userAgent(/chrome/i) && !userAgent(/android/i);
  var IOS = userAgent(/iP(ad|od|hone)/i);
  var ChromeForAndroid = userAgent(/chrome/i) && userAgent(/android/i);

  var captureMode = {
    capture: false,
    passive: false
  };

  function on(el, event, fn) {
    el.addEventListener(event, fn, !IE11OrLess && captureMode);
  }

  function off(el, event, fn) {
    el.removeEventListener(event, fn, !IE11OrLess && captureMode);
  }

  function matches(
  /**HTMLElement*/
  el,
  /**String*/
  selector) {
    if (!selector) return;
    selector[0] === '>' && (selector = selector.substring(1));

    if (el) {
      try {
        if (el.matches) {
          return el.matches(selector);
        } else if (el.msMatchesSelector) {
          return el.msMatchesSelector(selector);
        } else if (el.webkitMatchesSelector) {
          return el.webkitMatchesSelector(selector);
        }
      } catch (_) {
        return false;
      }
    }

    return false;
  }

  function getParentOrHost(el) {
    return el.host && el !== document && el.host.nodeType ? el.host : el.parentNode;
  }

  function closest(
  /**HTMLElement*/
  el,
  /**String*/
  selector,
  /**HTMLElement*/
  ctx, includeCTX) {
    if (el) {
      ctx = ctx || document;

      do {
        if (selector != null && (selector[0] === '>' ? el.parentNode === ctx && matches(el, selector) : matches(el, selector)) || includeCTX && el === ctx) {
          return el;
        }

        if (el === ctx) break;
        /* jshint boss:true */
      } while (el = getParentOrHost(el));
    }

    return null;
  }

  var R_SPACE = /\s+/g;

  function toggleClass(el, name, state) {
    if (el && name) {
      if (el.classList) {
        el.classList[state ? 'add' : 'remove'](name);
      } else {
        var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
        el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
      }
    }
  }

  function css(el, prop, val) {
    var style = el && el.style;

    if (style) {
      if (val === void 0) {
        if (document.defaultView && document.defaultView.getComputedStyle) {
          val = document.defaultView.getComputedStyle(el, '');
        } else if (el.currentStyle) {
          val = el.currentStyle;
        }

        return prop === void 0 ? val : val[prop];
      } else {
        if (!(prop in style) && prop.indexOf('webkit') === -1) {
          prop = '-webkit-' + prop;
        }

        style[prop] = val + (typeof val === 'string' ? '' : 'px');
      }
    }
  }

  function matrix(el, selfOnly) {
    var appliedTransforms = '';

    if (typeof el === 'string') {
      appliedTransforms = el;
    } else {
      do {
        var transform = css(el, 'transform');

        if (transform && transform !== 'none') {
          appliedTransforms = transform + ' ' + appliedTransforms;
        }
        /* jshint boss:true */

      } while (!selfOnly && (el = el.parentNode));
    }

    var matrixFn = window.DOMMatrix || window.WebKitCSSMatrix || window.CSSMatrix || window.MSCSSMatrix;
    /*jshint -W056 */

    return matrixFn && new matrixFn(appliedTransforms);
  }

  function find(ctx, tagName, iterator) {
    if (ctx) {
      var list = ctx.getElementsByTagName(tagName),
          i = 0,
          n = list.length;

      if (iterator) {
        for (; i < n; i++) {
          iterator(list[i], i);
        }
      }

      return list;
    }

    return [];
  }

  function getWindowScrollingElement() {
    var scrollingElement = document.scrollingElement;

    if (scrollingElement) {
      return scrollingElement;
    } else {
      return document.documentElement;
    }
  }
  /**
   * Returns the "bounding client rect" of given element
   * @param  {HTMLElement} el                       The element whose boundingClientRect is wanted
   * @param  {[Boolean]} relativeToContainingBlock  Whether the rect should be relative to the containing block of (including) the container
   * @param  {[Boolean]} relativeToNonStaticParent  Whether the rect should be relative to the relative parent of (including) the contaienr
   * @param  {[Boolean]} undoScale                  Whether the container's scale() should be undone
   * @param  {[HTMLElement]} container              The parent the element will be placed in
   * @return {Object}                               The boundingClientRect of el, with specified adjustments
   */


  function getRect(el, relativeToContainingBlock, relativeToNonStaticParent, undoScale, container) {
    if (!el.getBoundingClientRect && el !== window) return;
    var elRect, top, left, bottom, right, height, width;

    if (el !== window && el.parentNode && el !== getWindowScrollingElement()) {
      elRect = el.getBoundingClientRect();
      top = elRect.top;
      left = elRect.left;
      bottom = elRect.bottom;
      right = elRect.right;
      height = elRect.height;
      width = elRect.width;
    } else {
      top = 0;
      left = 0;
      bottom = window.innerHeight;
      right = window.innerWidth;
      height = window.innerHeight;
      width = window.innerWidth;
    }

    if ((relativeToContainingBlock || relativeToNonStaticParent) && el !== window) {
      // Adjust for translate()
      container = container || el.parentNode; // solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
      // Not needed on <= IE11

      if (!IE11OrLess) {
        do {
          if (container && container.getBoundingClientRect && (css(container, 'transform') !== 'none' || relativeToNonStaticParent && css(container, 'position') !== 'static')) {
            var containerRect = container.getBoundingClientRect(); // Set relative to edges of padding box of container

            top -= containerRect.top + parseInt(css(container, 'border-top-width'));
            left -= containerRect.left + parseInt(css(container, 'border-left-width'));
            bottom = top + elRect.height;
            right = left + elRect.width;
            break;
          }
          /* jshint boss:true */

        } while (container = container.parentNode);
      }
    }

    if (undoScale && el !== window) {
      // Adjust for scale()
      var elMatrix = matrix(container || el),
          scaleX = elMatrix && elMatrix.a,
          scaleY = elMatrix && elMatrix.d;

      if (elMatrix) {
        top /= scaleY;
        left /= scaleX;
        width /= scaleX;
        height /= scaleY;
        bottom = top + height;
        right = left + width;
      }
    }

    return {
      top: top,
      left: left,
      bottom: bottom,
      right: right,
      width: width,
      height: height
    };
  }
  /**
   * Checks if a side of an element is scrolled past a side of its parents
   * @param  {HTMLElement}  el           The element who's side being scrolled out of view is in question
   * @param  {String}       elSide       Side of the element in question ('top', 'left', 'right', 'bottom')
   * @param  {String}       parentSide   Side of the parent in question ('top', 'left', 'right', 'bottom')
   * @return {HTMLElement}               The parent scroll element that the el's side is scrolled past, or null if there is no such element
   */


  function isScrolledPast(el, elSide, parentSide) {
    var parent = getParentAutoScrollElement(el, true),
        elSideVal = getRect(el)[elSide];
    /* jshint boss:true */

    while (parent) {
      var parentSideVal = getRect(parent)[parentSide],
          visible = void 0;

      if (parentSide === 'top' || parentSide === 'left') {
        visible = elSideVal >= parentSideVal;
      } else {
        visible = elSideVal <= parentSideVal;
      }

      if (!visible) return parent;
      if (parent === getWindowScrollingElement()) break;
      parent = getParentAutoScrollElement(parent, false);
    }

    return false;
  }
  /**
   * Gets nth child of el, ignoring hidden children, sortable's elements (does not ignore clone if it's visible)
   * and non-draggable elements
   * @param  {HTMLElement} el       The parent element
   * @param  {Number} childNum      The index of the child
   * @param  {Object} options       Parent Sortable's options
   * @return {HTMLElement}          The child at index childNum, or null if not found
   */


  function getChild(el, childNum, options) {
    var currentChild = 0,
        i = 0,
        children = el.children;

    while (i < children.length) {
      if (children[i].style.display !== 'none' && children[i] !== Sortable.ghost && children[i] !== Sortable.dragged && closest(children[i], options.draggable, el, false)) {
        if (currentChild === childNum) {
          return children[i];
        }

        currentChild++;
      }

      i++;
    }

    return null;
  }
  /**
   * Gets the last child in the el, ignoring ghostEl or invisible elements (clones)
   * @param  {HTMLElement} el       Parent element
   * @param  {selector} selector    Any other elements that should be ignored
   * @return {HTMLElement}          The last child, ignoring ghostEl
   */


  function lastChild(el, selector) {
    var last = el.lastElementChild;

    while (last && (last === Sortable.ghost || css(last, 'display') === 'none' || selector && !matches(last, selector))) {
      last = last.previousElementSibling;
    }

    return last || null;
  }
  /**
   * Returns the index of an element within its parent for a selected set of
   * elements
   * @param  {HTMLElement} el
   * @param  {selector} selector
   * @return {number}
   */


  function index(el, selector) {
    var index = 0;

    if (!el || !el.parentNode) {
      return -1;
    }
    /* jshint boss:true */


    while (el = el.previousElementSibling) {
      if (el.nodeName.toUpperCase() !== 'TEMPLATE' && el !== Sortable.clone && (!selector || matches(el, selector))) {
        index++;
      }
    }

    return index;
  }
  /**
   * Returns the scroll offset of the given element, added with all the scroll offsets of parent elements.
   * The value is returned in real pixels.
   * @param  {HTMLElement} el
   * @return {Array}             Offsets in the format of [left, top]
   */


  function getRelativeScrollOffset(el) {
    var offsetLeft = 0,
        offsetTop = 0,
        winScroller = getWindowScrollingElement();

    if (el) {
      do {
        var elMatrix = matrix(el),
            scaleX = elMatrix.a,
            scaleY = elMatrix.d;
        offsetLeft += el.scrollLeft * scaleX;
        offsetTop += el.scrollTop * scaleY;
      } while (el !== winScroller && (el = el.parentNode));
    }

    return [offsetLeft, offsetTop];
  }
  /**
   * Returns the index of the object within the given array
   * @param  {Array} arr   Array that may or may not hold the object
   * @param  {Object} obj  An object that has a key-value pair unique to and identical to a key-value pair in the object you want to find
   * @return {Number}      The index of the object in the array, or -1
   */


  function indexOfObject(arr, obj) {
    for (var i in arr) {
      if (!arr.hasOwnProperty(i)) continue;

      for (var key in obj) {
        if (obj.hasOwnProperty(key) && obj[key] === arr[i][key]) return Number(i);
      }
    }

    return -1;
  }

  function getParentAutoScrollElement(el, includeSelf) {
    // skip to window
    if (!el || !el.getBoundingClientRect) return getWindowScrollingElement();
    var elem = el;
    var gotSelf = false;

    do {
      // we don't need to get elem css if it isn't even overflowing in the first place (performance)
      if (elem.clientWidth < elem.scrollWidth || elem.clientHeight < elem.scrollHeight) {
        var elemCSS = css(elem);

        if (elem.clientWidth < elem.scrollWidth && (elemCSS.overflowX == 'auto' || elemCSS.overflowX == 'scroll') || elem.clientHeight < elem.scrollHeight && (elemCSS.overflowY == 'auto' || elemCSS.overflowY == 'scroll')) {
          if (!elem.getBoundingClientRect || elem === document.body) return getWindowScrollingElement();
          if (gotSelf || includeSelf) return elem;
          gotSelf = true;
        }
      }
      /* jshint boss:true */

    } while (elem = elem.parentNode);

    return getWindowScrollingElement();
  }

  function extend(dst, src) {
    if (dst && src) {
      for (var key in src) {
        if (src.hasOwnProperty(key)) {
          dst[key] = src[key];
        }
      }
    }

    return dst;
  }

  function isRectEqual(rect1, rect2) {
    return Math.round(rect1.top) === Math.round(rect2.top) && Math.round(rect1.left) === Math.round(rect2.left) && Math.round(rect1.height) === Math.round(rect2.height) && Math.round(rect1.width) === Math.round(rect2.width);
  }

  var _throttleTimeout;

  function throttle(callback, ms) {
    return function () {
      if (!_throttleTimeout) {
        var args = arguments,
            _this = this;

        if (args.length === 1) {
          callback.call(_this, args[0]);
        } else {
          callback.apply(_this, args);
        }

        _throttleTimeout = setTimeout(function () {
          _throttleTimeout = void 0;
        }, ms);
      }
    };
  }

  function cancelThrottle() {
    clearTimeout(_throttleTimeout);
    _throttleTimeout = void 0;
  }

  function scrollBy(el, x, y) {
    el.scrollLeft += x;
    el.scrollTop += y;
  }

  function clone(el) {
    var Polymer = window.Polymer;
    var $ = window.jQuery || window.Zepto;

    if (Polymer && Polymer.dom) {
      return Polymer.dom(el).cloneNode(true);
    } else if ($) {
      return $(el).clone(true)[0];
    } else {
      return el.cloneNode(true);
    }
  }

  function setRect(el, rect) {
    css(el, 'position', 'absolute');
    css(el, 'top', rect.top);
    css(el, 'left', rect.left);
    css(el, 'width', rect.width);
    css(el, 'height', rect.height);
  }

  function unsetRect(el) {
    css(el, 'position', '');
    css(el, 'top', '');
    css(el, 'left', '');
    css(el, 'width', '');
    css(el, 'height', '');
  }

  var expando = 'Sortable' + new Date().getTime();

  function AnimationStateManager() {
    var animationStates = [],
        animationCallbackId;
    return {
      captureAnimationState: function captureAnimationState() {
        animationStates = [];
        if (!this.options.animation) return;
        var children = [].slice.call(this.el.children);
        children.forEach(function (child) {
          if (css(child, 'display') === 'none' || child === Sortable.ghost) return;
          animationStates.push({
            target: child,
            rect: getRect(child)
          });

          var fromRect = _objectSpread({}, animationStates[animationStates.length - 1].rect); // If animating: compensate for current animation


          if (child.thisAnimationDuration) {
            var childMatrix = matrix(child, true);

            if (childMatrix) {
              fromRect.top -= childMatrix.f;
              fromRect.left -= childMatrix.e;
            }
          }

          child.fromRect = fromRect;
        });
      },
      addAnimationState: function addAnimationState(state) {
        animationStates.push(state);
      },
      removeAnimationState: function removeAnimationState(target) {
        animationStates.splice(indexOfObject(animationStates, {
          target: target
        }), 1);
      },
      animateAll: function animateAll(callback) {
        var _this = this;

        if (!this.options.animation) {
          clearTimeout(animationCallbackId);
          if (typeof callback === 'function') callback();
          return;
        }

        var animating = false,
            animationTime = 0;
        animationStates.forEach(function (state) {
          var time = 0,
              target = state.target,
              fromRect = target.fromRect,
              toRect = getRect(target),
              prevFromRect = target.prevFromRect,
              prevToRect = target.prevToRect,
              animatingRect = state.rect,
              targetMatrix = matrix(target, true);

          if (targetMatrix) {
            // Compensate for current animation
            toRect.top -= targetMatrix.f;
            toRect.left -= targetMatrix.e;
          }

          target.toRect = toRect;

          if (target.thisAnimationDuration) {
            // Could also check if animatingRect is between fromRect and toRect
            if (isRectEqual(prevFromRect, toRect) && !isRectEqual(fromRect, toRect) && // Make sure animatingRect is on line between toRect & fromRect
            (animatingRect.top - toRect.top) / (animatingRect.left - toRect.left) === (fromRect.top - toRect.top) / (fromRect.left - toRect.left)) {
              // If returning to same place as started from animation and on same axis
              time = calculateRealTime(animatingRect, prevFromRect, prevToRect, _this.options);
            }
          } // if fromRect != toRect: animate


          if (!isRectEqual(toRect, fromRect)) {
            target.prevFromRect = fromRect;
            target.prevToRect = toRect;

            if (!time) {
              time = _this.options.animation;
            }

            _this.animate(target, animatingRect, toRect, time);
          }

          if (time) {
            animating = true;
            animationTime = Math.max(animationTime, time);
            clearTimeout(target.animationResetTimer);
            target.animationResetTimer = setTimeout(function () {
              target.animationTime = 0;
              target.prevFromRect = null;
              target.fromRect = null;
              target.prevToRect = null;
              target.thisAnimationDuration = null;
            }, time);
            target.thisAnimationDuration = time;
          }
        });
        clearTimeout(animationCallbackId);

        if (!animating) {
          if (typeof callback === 'function') callback();
        } else {
          animationCallbackId = setTimeout(function () {
            if (typeof callback === 'function') callback();
          }, animationTime);
        }

        animationStates = [];
      },
      animate: function animate(target, currentRect, toRect, duration) {
        if (duration) {
          css(target, 'transition', '');
          css(target, 'transform', '');
          var elMatrix = matrix(this.el),
              scaleX = elMatrix && elMatrix.a,
              scaleY = elMatrix && elMatrix.d,
              translateX = (currentRect.left - toRect.left) / (scaleX || 1),
              translateY = (currentRect.top - toRect.top) / (scaleY || 1);
          target.animatingX = !!translateX;
          target.animatingY = !!translateY;
          css(target, 'transform', 'translate3d(' + translateX + 'px,' + translateY + 'px,0)');
          this.forRepaintDummy = repaint(target); // repaint

          css(target, 'transition', 'transform ' + duration + 'ms' + (this.options.easing ? ' ' + this.options.easing : ''));
          css(target, 'transform', 'translate3d(0,0,0)');
          typeof target.animated === 'number' && clearTimeout(target.animated);
          target.animated = setTimeout(function () {
            css(target, 'transition', '');
            css(target, 'transform', '');
            target.animated = false;
            target.animatingX = false;
            target.animatingY = false;
          }, duration);
        }
      }
    };
  }

  function repaint(target) {
    return target.offsetWidth;
  }

  function calculateRealTime(animatingRect, fromRect, toRect, options) {
    return Math.sqrt(Math.pow(fromRect.top - animatingRect.top, 2) + Math.pow(fromRect.left - animatingRect.left, 2)) / Math.sqrt(Math.pow(fromRect.top - toRect.top, 2) + Math.pow(fromRect.left - toRect.left, 2)) * options.animation;
  }

  var plugins = [];
  var defaults = {
    initializeByDefault: true
  };
  var PluginManager = {
    mount: function mount(plugin) {
      // Set default static properties
      for (var option in defaults) {
        if (defaults.hasOwnProperty(option) && !(option in plugin)) {
          plugin[option] = defaults[option];
        }
      }

      plugins.forEach(function (p) {
        if (p.pluginName === plugin.pluginName) {
          throw "Sortable: Cannot mount plugin ".concat(plugin.pluginName, " more than once");
        }
      });
      plugins.push(plugin);
    },
    pluginEvent: function pluginEvent(eventName, sortable, evt) {
      var _this = this;

      this.eventCanceled = false;

      evt.cancel = function () {
        _this.eventCanceled = true;
      };

      var eventNameGlobal = eventName + 'Global';
      plugins.forEach(function (plugin) {
        if (!sortable[plugin.pluginName]) return; // Fire global events if it exists in this sortable

        if (sortable[plugin.pluginName][eventNameGlobal]) {
          sortable[plugin.pluginName][eventNameGlobal](_objectSpread({
            sortable: sortable
          }, evt));
        } // Only fire plugin event if plugin is enabled in this sortable,
        // and plugin has event defined


        if (sortable.options[plugin.pluginName] && sortable[plugin.pluginName][eventName]) {
          sortable[plugin.pluginName][eventName](_objectSpread({
            sortable: sortable
          }, evt));
        }
      });
    },
    initializePlugins: function initializePlugins(sortable, el, defaults, options) {
      plugins.forEach(function (plugin) {
        var pluginName = plugin.pluginName;
        if (!sortable.options[pluginName] && !plugin.initializeByDefault) return;
        var initialized = new plugin(sortable, el, sortable.options);
        initialized.sortable = sortable;
        initialized.options = sortable.options;
        sortable[pluginName] = initialized; // Add default options from plugin

        _extends(defaults, initialized.defaults);
      });

      for (var option in sortable.options) {
        if (!sortable.options.hasOwnProperty(option)) continue;
        var modified = this.modifyOption(sortable, option, sortable.options[option]);

        if (typeof modified !== 'undefined') {
          sortable.options[option] = modified;
        }
      }
    },
    getEventProperties: function getEventProperties(name, sortable) {
      var eventProperties = {};
      plugins.forEach(function (plugin) {
        if (typeof plugin.eventProperties !== 'function') return;

        _extends(eventProperties, plugin.eventProperties.call(sortable[plugin.pluginName], name));
      });
      return eventProperties;
    },
    modifyOption: function modifyOption(sortable, name, value) {
      var modifiedValue;
      plugins.forEach(function (plugin) {
        // Plugin must exist on the Sortable
        if (!sortable[plugin.pluginName]) return; // If static option listener exists for this option, call in the context of the Sortable's instance of this plugin

        if (plugin.optionListeners && typeof plugin.optionListeners[name] === 'function') {
          modifiedValue = plugin.optionListeners[name].call(sortable[plugin.pluginName], value);
        }
      });
      return modifiedValue;
    }
  };

  function dispatchEvent(_ref) {
    var sortable = _ref.sortable,
        rootEl = _ref.rootEl,
        name = _ref.name,
        targetEl = _ref.targetEl,
        cloneEl = _ref.cloneEl,
        toEl = _ref.toEl,
        fromEl = _ref.fromEl,
        oldIndex = _ref.oldIndex,
        newIndex = _ref.newIndex,
        oldDraggableIndex = _ref.oldDraggableIndex,
        newDraggableIndex = _ref.newDraggableIndex,
        originalEvent = _ref.originalEvent,
        putSortable = _ref.putSortable,
        extraEventProperties = _ref.extraEventProperties;
    sortable = sortable || rootEl && rootEl[expando];
    if (!sortable) return;
    var evt,
        options = sortable.options,
        onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1); // Support for new CustomEvent feature

    if (window.CustomEvent && !IE11OrLess && !Edge) {
      evt = new CustomEvent(name, {
        bubbles: true,
        cancelable: true
      });
    } else {
      evt = document.createEvent('Event');
      evt.initEvent(name, true, true);
    }

    evt.to = toEl || rootEl;
    evt.from = fromEl || rootEl;
    evt.item = targetEl || rootEl;
    evt.clone = cloneEl;
    evt.oldIndex = oldIndex;
    evt.newIndex = newIndex;
    evt.oldDraggableIndex = oldDraggableIndex;
    evt.newDraggableIndex = newDraggableIndex;
    evt.originalEvent = originalEvent;
    evt.pullMode = putSortable ? putSortable.lastPutMode : undefined;

    var allEventProperties = _objectSpread({}, extraEventProperties, PluginManager.getEventProperties(name, sortable));

    for (var option in allEventProperties) {
      evt[option] = allEventProperties[option];
    }

    if (rootEl) {
      rootEl.dispatchEvent(evt);
    }

    if (options[onName]) {
      options[onName].call(sortable, evt);
    }
  }

  var pluginEvent = function pluginEvent(eventName, sortable) {
    var _ref = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {},
        originalEvent = _ref.evt,
        data = _objectWithoutProperties(_ref, ["evt"]);

    PluginManager.pluginEvent.bind(Sortable)(eventName, sortable, _objectSpread({
      dragEl: dragEl,
      parentEl: parentEl,
      ghostEl: ghostEl,
      rootEl: rootEl,
      nextEl: nextEl,
      lastDownEl: lastDownEl,
      cloneEl: cloneEl,
      cloneHidden: cloneHidden,
      dragStarted: moved,
      putSortable: putSortable,
      activeSortable: Sortable.active,
      originalEvent: originalEvent,
      oldIndex: oldIndex,
      oldDraggableIndex: oldDraggableIndex,
      newIndex: newIndex,
      newDraggableIndex: newDraggableIndex,
      hideGhostForTarget: _hideGhostForTarget,
      unhideGhostForTarget: _unhideGhostForTarget,
      cloneNowHidden: function cloneNowHidden() {
        cloneHidden = true;
      },
      cloneNowShown: function cloneNowShown() {
        cloneHidden = false;
      },
      dispatchSortableEvent: function dispatchSortableEvent(name) {
        _dispatchEvent({
          sortable: sortable,
          name: name,
          originalEvent: originalEvent
        });
      }
    }, data));
  };

  function _dispatchEvent(info) {
    dispatchEvent(_objectSpread({
      putSortable: putSortable,
      cloneEl: cloneEl,
      targetEl: dragEl,
      rootEl: rootEl,
      oldIndex: oldIndex,
      oldDraggableIndex: oldDraggableIndex,
      newIndex: newIndex,
      newDraggableIndex: newDraggableIndex
    }, info));
  }

  var dragEl,
      parentEl,
      ghostEl,
      rootEl,
      nextEl,
      lastDownEl,
      cloneEl,
      cloneHidden,
      oldIndex,
      newIndex,
      oldDraggableIndex,
      newDraggableIndex,
      activeGroup,
      putSortable,
      awaitingDragStarted = false,
      ignoreNextClick = false,
      sortables = [],
      tapEvt,
      touchEvt,
      lastDx,
      lastDy,
      tapDistanceLeft,
      tapDistanceTop,
      moved,
      lastTarget,
      lastDirection,
      pastFirstInvertThresh = false,
      isCircumstantialInvert = false,
      targetMoveDistance,
      // For positioning ghost absolutely
  ghostRelativeParent,
      ghostRelativeParentInitialScroll = [],
      // (left, top)
  _silent = false,
      savedInputChecked = [];
  /** @const */

  var documentExists = typeof document !== 'undefined',
      PositionGhostAbsolutely = IOS,
      CSSFloatProperty = Edge || IE11OrLess ? 'cssFloat' : 'float',
      // This will not pass for IE9, because IE9 DnD only works on anchors
  supportDraggable = documentExists && !ChromeForAndroid && !IOS && 'draggable' in document.createElement('div'),
      supportCssPointerEvents = function () {
    if (!documentExists) return; // false when <= IE11

    if (IE11OrLess) {
      return false;
    }

    var el = document.createElement('x');
    el.style.cssText = 'pointer-events:auto';
    return el.style.pointerEvents === 'auto';
  }(),
      _detectDirection = function _detectDirection(el, options) {
    var elCSS = css(el),
        elWidth = parseInt(elCSS.width) - parseInt(elCSS.paddingLeft) - parseInt(elCSS.paddingRight) - parseInt(elCSS.borderLeftWidth) - parseInt(elCSS.borderRightWidth),
        child1 = getChild(el, 0, options),
        child2 = getChild(el, 1, options),
        firstChildCSS = child1 && css(child1),
        secondChildCSS = child2 && css(child2),
        firstChildWidth = firstChildCSS && parseInt(firstChildCSS.marginLeft) + parseInt(firstChildCSS.marginRight) + getRect(child1).width,
        secondChildWidth = secondChildCSS && parseInt(secondChildCSS.marginLeft) + parseInt(secondChildCSS.marginRight) + getRect(child2).width;

    if (elCSS.display === 'flex') {
      return elCSS.flexDirection === 'column' || elCSS.flexDirection === 'column-reverse' ? 'vertical' : 'horizontal';
    }

    if (elCSS.display === 'grid') {
      return elCSS.gridTemplateColumns.split(' ').length <= 1 ? 'vertical' : 'horizontal';
    }

    if (child1 && firstChildCSS["float"] && firstChildCSS["float"] !== 'none') {
      var touchingSideChild2 = firstChildCSS["float"] === 'left' ? 'left' : 'right';
      return child2 && (secondChildCSS.clear === 'both' || secondChildCSS.clear === touchingSideChild2) ? 'vertical' : 'horizontal';
    }

    return child1 && (firstChildCSS.display === 'block' || firstChildCSS.display === 'flex' || firstChildCSS.display === 'table' || firstChildCSS.display === 'grid' || firstChildWidth >= elWidth && elCSS[CSSFloatProperty] === 'none' || child2 && elCSS[CSSFloatProperty] === 'none' && firstChildWidth + secondChildWidth > elWidth) ? 'vertical' : 'horizontal';
  },
      _dragElInRowColumn = function _dragElInRowColumn(dragRect, targetRect, vertical) {
    var dragElS1Opp = vertical ? dragRect.left : dragRect.top,
        dragElS2Opp = vertical ? dragRect.right : dragRect.bottom,
        dragElOppLength = vertical ? dragRect.width : dragRect.height,
        targetS1Opp = vertical ? targetRect.left : targetRect.top,
        targetS2Opp = vertical ? targetRect.right : targetRect.bottom,
        targetOppLength = vertical ? targetRect.width : targetRect.height;
    return dragElS1Opp === targetS1Opp || dragElS2Opp === targetS2Opp || dragElS1Opp + dragElOppLength / 2 === targetS1Opp + targetOppLength / 2;
  },

  /**
   * Detects first nearest empty sortable to X and Y position using emptyInsertThreshold.
   * @param  {Number} x      X position
   * @param  {Number} y      Y position
   * @return {HTMLElement}   Element of the first found nearest Sortable
   */
  _detectNearestEmptySortable = function _detectNearestEmptySortable(x, y) {
    var ret;
    sortables.some(function (sortable) {
      if (lastChild(sortable)) return;
      var rect = getRect(sortable),
          threshold = sortable[expando].options.emptyInsertThreshold,
          insideHorizontally = x >= rect.left - threshold && x <= rect.right + threshold,
          insideVertically = y >= rect.top - threshold && y <= rect.bottom + threshold;

      if (threshold && insideHorizontally && insideVertically) {
        return ret = sortable;
      }
    });
    return ret;
  },
      _prepareGroup = function _prepareGroup(options) {
    function toFn(value, pull) {
      return function (to, from, dragEl, evt) {
        var sameGroup = to.options.group.name && from.options.group.name && to.options.group.name === from.options.group.name;

        if (value == null && (pull || sameGroup)) {
          // Default pull value
          // Default pull and put value if same group
          return true;
        } else if (value == null || value === false) {
          return false;
        } else if (pull && value === 'clone') {
          return value;
        } else if (typeof value === 'function') {
          return toFn(value(to, from, dragEl, evt), pull)(to, from, dragEl, evt);
        } else {
          var otherGroup = (pull ? to : from).options.group.name;
          return value === true || typeof value === 'string' && value === otherGroup || value.join && value.indexOf(otherGroup) > -1;
        }
      };
    }

    var group = {};
    var originalGroup = options.group;

    if (!originalGroup || _typeof(originalGroup) != 'object') {
      originalGroup = {
        name: originalGroup
      };
    }

    group.name = originalGroup.name;
    group.checkPull = toFn(originalGroup.pull, true);
    group.checkPut = toFn(originalGroup.put);
    group.revertClone = originalGroup.revertClone;
    options.group = group;
  },
      _hideGhostForTarget = function _hideGhostForTarget() {
    if (!supportCssPointerEvents && ghostEl) {
      css(ghostEl, 'display', 'none');
    }
  },
      _unhideGhostForTarget = function _unhideGhostForTarget() {
    if (!supportCssPointerEvents && ghostEl) {
      css(ghostEl, 'display', '');
    }
  }; // #1184 fix - Prevent click event on fallback if dragged but item not changed position


  if (documentExists) {
    document.addEventListener('click', function (evt) {
      if (ignoreNextClick) {
        evt.preventDefault();
        evt.stopPropagation && evt.stopPropagation();
        evt.stopImmediatePropagation && evt.stopImmediatePropagation();
        ignoreNextClick = false;
        return false;
      }
    }, true);
  }

  var nearestEmptyInsertDetectEvent = function nearestEmptyInsertDetectEvent(evt) {
    if (dragEl) {
      evt = evt.touches ? evt.touches[0] : evt;

      var nearest = _detectNearestEmptySortable(evt.clientX, evt.clientY);

      if (nearest) {
        // Create imitation event
        var event = {};

        for (var i in evt) {
          if (evt.hasOwnProperty(i)) {
            event[i] = evt[i];
          }
        }

        event.target = event.rootEl = nearest;
        event.preventDefault = void 0;
        event.stopPropagation = void 0;

        nearest[expando]._onDragOver(event);
      }
    }
  };

  var _checkOutsideTargetEl = function _checkOutsideTargetEl(evt) {
    if (dragEl) {
      dragEl.parentNode[expando]._isOutsideThisEl(evt.target);
    }
  };
  /**
   * @class  Sortable
   * @param  {HTMLElement}  el
   * @param  {Object}       [options]
   */


  function Sortable(el, options) {
    if (!(el && el.nodeType && el.nodeType === 1)) {
      throw "Sortable: `el` must be an HTMLElement, not ".concat({}.toString.call(el));
    }

    this.el = el; // root element

    this.options = options = _extends({}, options); // Export instance

    el[expando] = this;
    var defaults = {
      group: null,
      sort: true,
      disabled: false,
      store: null,
      handle: null,
      draggable: /^[uo]l$/i.test(el.nodeName) ? '>li' : '>*',
      swapThreshold: 1,
      // percentage; 0 <= x <= 1
      invertSwap: false,
      // invert always
      invertedSwapThreshold: null,
      // will be set to same as swapThreshold if default
      removeCloneOnHide: true,
      direction: function direction() {
        return _detectDirection(el, this.options);
      },
      ghostClass: 'sortable-ghost',
      chosenClass: 'sortable-chosen',
      dragClass: 'sortable-drag',
      ignore: 'a, img',
      filter: null,
      preventOnFilter: true,
      animation: 0,
      easing: null,
      setData: function setData(dataTransfer, dragEl) {
        dataTransfer.setData('Text', dragEl.textContent);
      },
      dropBubble: false,
      dragoverBubble: false,
      dataIdAttr: 'data-id',
      delay: 0,
      delayOnTouchOnly: false,
      touchStartThreshold: (Number.parseInt ? Number : window).parseInt(window.devicePixelRatio, 10) || 1,
      forceFallback: false,
      fallbackClass: 'sortable-fallback',
      fallbackOnBody: false,
      fallbackTolerance: 0,
      fallbackOffset: {
        x: 0,
        y: 0
      },
      supportPointer: Sortable.supportPointer !== false && 'PointerEvent' in window && !Safari,
      emptyInsertThreshold: 5
    };
    PluginManager.initializePlugins(this, el, defaults); // Set default options

    for (var name in defaults) {
      !(name in options) && (options[name] = defaults[name]);
    }

    _prepareGroup(options); // Bind all private methods


    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    } // Setup drag mode


    this.nativeDraggable = options.forceFallback ? false : supportDraggable;

    if (this.nativeDraggable) {
      // Touch start threshold cannot be greater than the native dragstart threshold
      this.options.touchStartThreshold = 1;
    } // Bind events


    if (options.supportPointer) {
      on(el, 'pointerdown', this._onTapStart);
    } else {
      on(el, 'mousedown', this._onTapStart);
      on(el, 'touchstart', this._onTapStart);
    }

    if (this.nativeDraggable) {
      on(el, 'dragover', this);
      on(el, 'dragenter', this);
    }

    sortables.push(this.el); // Restore sorting

    options.store && options.store.get && this.sort(options.store.get(this) || []); // Add animation state manager

    _extends(this, AnimationStateManager());
  }

  Sortable.prototype =
  /** @lends Sortable.prototype */
  {
    constructor: Sortable,
    _isOutsideThisEl: function _isOutsideThisEl(target) {
      if (!this.el.contains(target) && target !== this.el) {
        lastTarget = null;
      }
    },
    _getDirection: function _getDirection(evt, target) {
      return typeof this.options.direction === 'function' ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
    },
    _onTapStart: function _onTapStart(
    /** Event|TouchEvent */
    evt) {
      if (!evt.cancelable) return;

      var _this = this,
          el = this.el,
          options = this.options,
          preventOnFilter = options.preventOnFilter,
          type = evt.type,
          touch = evt.touches && evt.touches[0] || evt.pointerType && evt.pointerType === 'touch' && evt,
          target = (touch || evt).target,
          originalTarget = evt.target.shadowRoot && (evt.path && evt.path[0] || evt.composedPath && evt.composedPath()[0]) || target,
          filter = options.filter;

      _saveInputCheckedState(el); // Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.


      if (dragEl) {
        return;
      }

      if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
        return; // only left button and enabled
      } // cancel dnd if original target is content editable


      if (originalTarget.isContentEditable) {
        return;
      } // Safari ignores further event handling after mousedown


      if (!this.nativeDraggable && Safari && target && target.tagName.toUpperCase() === 'SELECT') {
        return;
      }

      target = closest(target, options.draggable, el, false);

      if (target && target.animated) {
        return;
      }

      if (lastDownEl === target) {
        // Ignoring duplicate `down`
        return;
      } // Get the index of the dragged element within its parent


      oldIndex = index(target);
      oldDraggableIndex = index(target, options.draggable); // Check filter

      if (typeof filter === 'function') {
        if (filter.call(this, evt, target, this)) {
          _dispatchEvent({
            sortable: _this,
            rootEl: originalTarget,
            name: 'filter',
            targetEl: target,
            toEl: el,
            fromEl: el
          });

          pluginEvent('filter', _this, {
            evt: evt
          });
          preventOnFilter && evt.cancelable && evt.preventDefault();
          return; // cancel dnd
        }
      } else if (filter) {
        filter = filter.split(',').some(function (criteria) {
          criteria = closest(originalTarget, criteria.trim(), el, false);

          if (criteria) {
            _dispatchEvent({
              sortable: _this,
              rootEl: criteria,
              name: 'filter',
              targetEl: target,
              fromEl: el,
              toEl: el
            });

            pluginEvent('filter', _this, {
              evt: evt
            });
            return true;
          }
        });

        if (filter) {
          preventOnFilter && evt.cancelable && evt.preventDefault();
          return; // cancel dnd
        }
      }

      if (options.handle && !closest(originalTarget, options.handle, el, false)) {
        return;
      } // Prepare `dragstart`


      this._prepareDragStart(evt, touch, target);
    },
    _prepareDragStart: function _prepareDragStart(
    /** Event */
    evt,
    /** Touch */
    touch,
    /** HTMLElement */
    target) {
      var _this = this,
          el = _this.el,
          options = _this.options,
          ownerDocument = el.ownerDocument,
          dragStartFn;

      if (target && !dragEl && target.parentNode === el) {
        var dragRect = getRect(target);
        rootEl = el;
        dragEl = target;
        parentEl = dragEl.parentNode;
        nextEl = dragEl.nextSibling;
        lastDownEl = target;
        activeGroup = options.group;
        Sortable.dragged = dragEl;
        tapEvt = {
          target: dragEl,
          clientX: (touch || evt).clientX,
          clientY: (touch || evt).clientY
        };
        tapDistanceLeft = tapEvt.clientX - dragRect.left;
        tapDistanceTop = tapEvt.clientY - dragRect.top;
        this._lastX = (touch || evt).clientX;
        this._lastY = (touch || evt).clientY;
        dragEl.style['will-change'] = 'all';

        dragStartFn = function dragStartFn() {
          pluginEvent('delayEnded', _this, {
            evt: evt
          });

          if (Sortable.eventCanceled) {
            _this._onDrop();

            return;
          } // Delayed drag has been triggered
          // we can re-enable the events: touchmove/mousemove


          _this._disableDelayedDragEvents();

          if (!FireFox && _this.nativeDraggable) {
            dragEl.draggable = true;
          } // Bind the events: dragstart/dragend


          _this._triggerDragStart(evt, touch); // Drag start event


          _dispatchEvent({
            sortable: _this,
            name: 'choose',
            originalEvent: evt
          }); // Chosen item


          toggleClass(dragEl, options.chosenClass, true);
        }; // Disable "draggable"


        options.ignore.split(',').forEach(function (criteria) {
          find(dragEl, criteria.trim(), _disableDraggable);
        });
        on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
        on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
        on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);
        on(ownerDocument, 'mouseup', _this._onDrop);
        on(ownerDocument, 'touchend', _this._onDrop);
        on(ownerDocument, 'touchcancel', _this._onDrop); // Make dragEl draggable (must be before delay for FireFox)

        if (FireFox && this.nativeDraggable) {
          this.options.touchStartThreshold = 4;
          dragEl.draggable = true;
        }

        pluginEvent('delayStart', this, {
          evt: evt
        }); // Delay is impossible for native DnD in Edge or IE

        if (options.delay && (!options.delayOnTouchOnly || touch) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
          if (Sortable.eventCanceled) {
            this._onDrop();

            return;
          } // If the user moves the pointer or let go the click or touch
          // before the delay has been reached:
          // disable the delayed drag


          on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
          on(ownerDocument, 'touchend', _this._disableDelayedDrag);
          on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
          on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
          on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
          options.supportPointer && on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);
          _this._dragStartTimer = setTimeout(dragStartFn, options.delay);
        } else {
          dragStartFn();
        }
      }
    },
    _delayedDragTouchMoveHandler: function _delayedDragTouchMoveHandler(
    /** TouchEvent|PointerEvent **/
    e) {
      var touch = e.touches ? e.touches[0] : e;

      if (Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) >= Math.floor(this.options.touchStartThreshold / (this.nativeDraggable && window.devicePixelRatio || 1))) {
        this._disableDelayedDrag();
      }
    },
    _disableDelayedDrag: function _disableDelayedDrag() {
      dragEl && _disableDraggable(dragEl);
      clearTimeout(this._dragStartTimer);

      this._disableDelayedDragEvents();
    },
    _disableDelayedDragEvents: function _disableDelayedDragEvents() {
      var ownerDocument = this.el.ownerDocument;
      off(ownerDocument, 'mouseup', this._disableDelayedDrag);
      off(ownerDocument, 'touchend', this._disableDelayedDrag);
      off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
      off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
      off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
      off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
    },
    _triggerDragStart: function _triggerDragStart(
    /** Event */
    evt,
    /** Touch */
    touch) {
      touch = touch || evt.pointerType == 'touch' && evt;

      if (!this.nativeDraggable || touch) {
        if (this.options.supportPointer) {
          on(document, 'pointermove', this._onTouchMove);
        } else if (touch) {
          on(document, 'touchmove', this._onTouchMove);
        } else {
          on(document, 'mousemove', this._onTouchMove);
        }
      } else {
        on(dragEl, 'dragend', this);
        on(rootEl, 'dragstart', this._onDragStart);
      }

      try {
        if (document.selection) {
          // Timeout neccessary for IE9
          _nextTick(function () {
            document.selection.empty();
          });
        } else {
          window.getSelection().removeAllRanges();
        }
      } catch (err) {}
    },
    _dragStarted: function _dragStarted(fallback, evt) {

      awaitingDragStarted = false;

      if (rootEl && dragEl) {
        pluginEvent('dragStarted', this, {
          evt: evt
        });

        if (this.nativeDraggable) {
          on(document, 'dragover', _checkOutsideTargetEl);
        }

        var options = this.options; // Apply effect

        !fallback && toggleClass(dragEl, options.dragClass, false);
        toggleClass(dragEl, options.ghostClass, true);
        Sortable.active = this;
        fallback && this._appendGhost(); // Drag start event

        _dispatchEvent({
          sortable: this,
          name: 'start',
          originalEvent: evt
        });
      } else {
        this._nulling();
      }
    },
    _emulateDragOver: function _emulateDragOver() {
      if (touchEvt) {
        this._lastX = touchEvt.clientX;
        this._lastY = touchEvt.clientY;

        _hideGhostForTarget();

        var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
        var parent = target;

        while (target && target.shadowRoot) {
          target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
          if (target === parent) break;
          parent = target;
        }

        dragEl.parentNode[expando]._isOutsideThisEl(target);

        if (parent) {
          do {
            if (parent[expando]) {
              var inserted = void 0;
              inserted = parent[expando]._onDragOver({
                clientX: touchEvt.clientX,
                clientY: touchEvt.clientY,
                target: target,
                rootEl: parent
              });

              if (inserted && !this.options.dragoverBubble) {
                break;
              }
            }

            target = parent; // store last element
          }
          /* jshint boss:true */
          while (parent = parent.parentNode);
        }

        _unhideGhostForTarget();
      }
    },
    _onTouchMove: function _onTouchMove(
    /**TouchEvent*/
    evt) {
      if (tapEvt) {
        var options = this.options,
            fallbackTolerance = options.fallbackTolerance,
            fallbackOffset = options.fallbackOffset,
            touch = evt.touches ? evt.touches[0] : evt,
            ghostMatrix = ghostEl && matrix(ghostEl, true),
            scaleX = ghostEl && ghostMatrix && ghostMatrix.a,
            scaleY = ghostEl && ghostMatrix && ghostMatrix.d,
            relativeScrollOffset = PositionGhostAbsolutely && ghostRelativeParent && getRelativeScrollOffset(ghostRelativeParent),
            dx = (touch.clientX - tapEvt.clientX + fallbackOffset.x) / (scaleX || 1) + (relativeScrollOffset ? relativeScrollOffset[0] - ghostRelativeParentInitialScroll[0] : 0) / (scaleX || 1),
            dy = (touch.clientY - tapEvt.clientY + fallbackOffset.y) / (scaleY || 1) + (relativeScrollOffset ? relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1] : 0) / (scaleY || 1); // only set the status to dragging, when we are actually dragging

        if (!Sortable.active && !awaitingDragStarted) {
          if (fallbackTolerance && Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) < fallbackTolerance) {
            return;
          }

          this._onDragStart(evt, true);
        }

        if (ghostEl) {
          if (ghostMatrix) {
            ghostMatrix.e += dx - (lastDx || 0);
            ghostMatrix.f += dy - (lastDy || 0);
          } else {
            ghostMatrix = {
              a: 1,
              b: 0,
              c: 0,
              d: 1,
              e: dx,
              f: dy
            };
          }

          var cssMatrix = "matrix(".concat(ghostMatrix.a, ",").concat(ghostMatrix.b, ",").concat(ghostMatrix.c, ",").concat(ghostMatrix.d, ",").concat(ghostMatrix.e, ",").concat(ghostMatrix.f, ")");
          css(ghostEl, 'webkitTransform', cssMatrix);
          css(ghostEl, 'mozTransform', cssMatrix);
          css(ghostEl, 'msTransform', cssMatrix);
          css(ghostEl, 'transform', cssMatrix);
          lastDx = dx;
          lastDy = dy;
          touchEvt = touch;
        }

        evt.cancelable && evt.preventDefault();
      }
    },
    _appendGhost: function _appendGhost() {
      // Bug if using scale(): https://stackoverflow.com/questions/2637058
      // Not being adjusted for
      if (!ghostEl) {
        var container = this.options.fallbackOnBody ? document.body : rootEl,
            rect = getRect(dragEl, true, PositionGhostAbsolutely, true, container),
            options = this.options; // Position absolutely

        if (PositionGhostAbsolutely) {
          // Get relatively positioned parent
          ghostRelativeParent = container;

          while (css(ghostRelativeParent, 'position') === 'static' && css(ghostRelativeParent, 'transform') === 'none' && ghostRelativeParent !== document) {
            ghostRelativeParent = ghostRelativeParent.parentNode;
          }

          if (ghostRelativeParent !== document.body && ghostRelativeParent !== document.documentElement) {
            if (ghostRelativeParent === document) ghostRelativeParent = getWindowScrollingElement();
            rect.top += ghostRelativeParent.scrollTop;
            rect.left += ghostRelativeParent.scrollLeft;
          } else {
            ghostRelativeParent = getWindowScrollingElement();
          }

          ghostRelativeParentInitialScroll = getRelativeScrollOffset(ghostRelativeParent);
        }

        ghostEl = dragEl.cloneNode(true);
        toggleClass(ghostEl, options.ghostClass, false);
        toggleClass(ghostEl, options.fallbackClass, true);
        toggleClass(ghostEl, options.dragClass, true);
        css(ghostEl, 'transition', '');
        css(ghostEl, 'transform', '');
        css(ghostEl, 'box-sizing', 'border-box');
        css(ghostEl, 'margin', 0);
        css(ghostEl, 'top', rect.top);
        css(ghostEl, 'left', rect.left);
        css(ghostEl, 'width', rect.width);
        css(ghostEl, 'height', rect.height);
        css(ghostEl, 'opacity', '0.8');
        css(ghostEl, 'position', PositionGhostAbsolutely ? 'absolute' : 'fixed');
        css(ghostEl, 'zIndex', '100000');
        css(ghostEl, 'pointerEvents', 'none');
        Sortable.ghost = ghostEl;
        container.appendChild(ghostEl); // Set transform-origin

        css(ghostEl, 'transform-origin', tapDistanceLeft / parseInt(ghostEl.style.width) * 100 + '% ' + tapDistanceTop / parseInt(ghostEl.style.height) * 100 + '%');
      }
    },
    _onDragStart: function _onDragStart(
    /**Event*/
    evt,
    /**boolean*/
    fallback) {
      var _this = this;

      var dataTransfer = evt.dataTransfer;
      var options = _this.options;
      pluginEvent('dragStart', this, {
        evt: evt
      });

      if (Sortable.eventCanceled) {
        this._onDrop();

        return;
      }

      pluginEvent('setupClone', this);

      if (!Sortable.eventCanceled) {
        cloneEl = clone(dragEl);
        cloneEl.draggable = false;
        cloneEl.style['will-change'] = '';

        this._hideClone();

        toggleClass(cloneEl, this.options.chosenClass, false);
        Sortable.clone = cloneEl;
      } // #1143: IFrame support workaround


      _this.cloneId = _nextTick(function () {
        pluginEvent('clone', _this);
        if (Sortable.eventCanceled) return;

        if (!_this.options.removeCloneOnHide) {
          rootEl.insertBefore(cloneEl, dragEl);
        }

        _this._hideClone();

        _dispatchEvent({
          sortable: _this,
          name: 'clone'
        });
      });
      !fallback && toggleClass(dragEl, options.dragClass, true); // Set proper drop events

      if (fallback) {
        ignoreNextClick = true;
        _this._loopId = setInterval(_this._emulateDragOver, 50);
      } else {
        // Undo what was set in _prepareDragStart before drag started
        off(document, 'mouseup', _this._onDrop);
        off(document, 'touchend', _this._onDrop);
        off(document, 'touchcancel', _this._onDrop);

        if (dataTransfer) {
          dataTransfer.effectAllowed = 'move';
          options.setData && options.setData.call(_this, dataTransfer, dragEl);
        }

        on(document, 'drop', _this); // #1276 fix:

        css(dragEl, 'transform', 'translateZ(0)');
      }

      awaitingDragStarted = true;
      _this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
      on(document, 'selectstart', _this);
      moved = true;

      if (Safari) {
        css(document.body, 'user-select', 'none');
      }
    },
    // Returns true - if no further action is needed (either inserted or another condition)
    _onDragOver: function _onDragOver(
    /**Event*/
    evt) {
      var el = this.el,
          target = evt.target,
          dragRect,
          targetRect,
          revert,
          options = this.options,
          group = options.group,
          activeSortable = Sortable.active,
          isOwner = activeGroup === group,
          canSort = options.sort,
          fromSortable = putSortable || activeSortable,
          vertical,
          _this = this,
          completedFired = false;

      if (_silent) return;

      function dragOverEvent(name, extra) {
        pluginEvent(name, _this, _objectSpread({
          evt: evt,
          isOwner: isOwner,
          axis: vertical ? 'vertical' : 'horizontal',
          revert: revert,
          dragRect: dragRect,
          targetRect: targetRect,
          canSort: canSort,
          fromSortable: fromSortable,
          target: target,
          completed: completed,
          onMove: function onMove(target, after) {
            return _onMove(rootEl, el, dragEl, dragRect, target, getRect(target), evt, after);
          },
          changed: changed
        }, extra));
      } // Capture animation state


      function capture() {
        dragOverEvent('dragOverAnimationCapture');

        _this.captureAnimationState();

        if (_this !== fromSortable) {
          fromSortable.captureAnimationState();
        }
      } // Return invocation when dragEl is inserted (or completed)


      function completed(insertion) {
        dragOverEvent('dragOverCompleted', {
          insertion: insertion
        });

        if (insertion) {
          // Clones must be hidden before folding animation to capture dragRectAbsolute properly
          if (isOwner) {
            activeSortable._hideClone();
          } else {
            activeSortable._showClone(_this);
          }

          if (_this !== fromSortable) {
            // Set ghost class to new sortable's ghost class
            toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : activeSortable.options.ghostClass, false);
            toggleClass(dragEl, options.ghostClass, true);
          }

          if (putSortable !== _this && _this !== Sortable.active) {
            putSortable = _this;
          } else if (_this === Sortable.active && putSortable) {
            putSortable = null;
          } // Animation


          if (fromSortable === _this) {
            _this._ignoreWhileAnimating = target;
          }

          _this.animateAll(function () {
            dragOverEvent('dragOverAnimationComplete');
            _this._ignoreWhileAnimating = null;
          });

          if (_this !== fromSortable) {
            fromSortable.animateAll();
            fromSortable._ignoreWhileAnimating = null;
          }
        } // Null lastTarget if it is not inside a previously swapped element


        if (target === dragEl && !dragEl.animated || target === el && !target.animated) {
          lastTarget = null;
        } // no bubbling and not fallback


        if (!options.dragoverBubble && !evt.rootEl && target !== document) {
          dragEl.parentNode[expando]._isOutsideThisEl(evt.target); // Do not detect for empty insert if already inserted


          !insertion && nearestEmptyInsertDetectEvent(evt);
        }

        !options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();
        return completedFired = true;
      } // Call when dragEl has been inserted


      function changed() {
        newIndex = index(dragEl);
        newDraggableIndex = index(dragEl, options.draggable);

        _dispatchEvent({
          sortable: _this,
          name: 'change',
          toEl: el,
          newIndex: newIndex,
          newDraggableIndex: newDraggableIndex,
          originalEvent: evt
        });
      }

      if (evt.preventDefault !== void 0) {
        evt.cancelable && evt.preventDefault();
      }

      target = closest(target, options.draggable, el, true);
      dragOverEvent('dragOver');
      if (Sortable.eventCanceled) return completedFired;

      if (dragEl.contains(evt.target) || target.animated && target.animatingX && target.animatingY || _this._ignoreWhileAnimating === target) {
        return completed(false);
      }

      ignoreNextClick = false;

      if (activeSortable && !options.disabled && (isOwner ? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
      : putSortable === this || (this.lastPutMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) && group.checkPut(this, activeSortable, dragEl, evt))) {
        vertical = this._getDirection(evt, target) === 'vertical';
        dragRect = getRect(dragEl);
        dragOverEvent('dragOverValid');
        if (Sortable.eventCanceled) return completedFired;

        if (revert) {
          parentEl = rootEl; // actualization

          capture();

          this._hideClone();

          dragOverEvent('revert');

          if (!Sortable.eventCanceled) {
            if (nextEl) {
              rootEl.insertBefore(dragEl, nextEl);
            } else {
              rootEl.appendChild(dragEl);
            }
          }

          return completed(true);
        }

        var elLastChild = lastChild(el, options.draggable);

        if (!elLastChild || _ghostIsLast(evt, vertical, this) && !elLastChild.animated) {
          // If already at end of list: Do not insert
          if (elLastChild === dragEl) {
            return completed(false);
          } // assign target only if condition is true


          if (elLastChild && el === evt.target) {
            target = elLastChild;
          }

          if (target) {
            targetRect = getRect(target);
          }

          if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
            capture();
            el.appendChild(dragEl);
            parentEl = el; // actualization

            changed();
            return completed(true);
          }
        } else if (target.parentNode === el) {
          targetRect = getRect(target);
          var direction = 0,
              targetBeforeFirstSwap,
              differentLevel = dragEl.parentNode !== el,
              differentRowCol = !_dragElInRowColumn(dragEl.animated && dragEl.toRect || dragRect, target.animated && target.toRect || targetRect, vertical),
              side1 = vertical ? 'top' : 'left',
              scrolledPastTop = isScrolledPast(target, 'top', 'top') || isScrolledPast(dragEl, 'top', 'top'),
              scrollBefore = scrolledPastTop ? scrolledPastTop.scrollTop : void 0;

          if (lastTarget !== target) {
            targetBeforeFirstSwap = targetRect[side1];
            pastFirstInvertThresh = false;
            isCircumstantialInvert = !differentRowCol && options.invertSwap || differentLevel;
          }

          direction = _getSwapDirection(evt, target, targetRect, vertical, differentRowCol ? 1 : options.swapThreshold, options.invertedSwapThreshold == null ? options.swapThreshold : options.invertedSwapThreshold, isCircumstantialInvert, lastTarget === target);
          var sibling;

          if (direction !== 0) {
            // Check if target is beside dragEl in respective direction (ignoring hidden elements)
            var dragIndex = index(dragEl);

            do {
              dragIndex -= direction;
              sibling = parentEl.children[dragIndex];
            } while (sibling && (css(sibling, 'display') === 'none' || sibling === ghostEl));
          } // If dragEl is already beside target: Do not insert


          if (direction === 0 || sibling === target) {
            return completed(false);
          }

          lastTarget = target;
          lastDirection = direction;
          var nextSibling = target.nextElementSibling,
              after = false;
          after = direction === 1;

          var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

          if (moveVector !== false) {
            if (moveVector === 1 || moveVector === -1) {
              after = moveVector === 1;
            }

            _silent = true;
            setTimeout(_unsilent, 30);
            capture();

            if (after && !nextSibling) {
              el.appendChild(dragEl);
            } else {
              target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
            } // Undo chrome's scroll adjustment (has no effect on other browsers)


            if (scrolledPastTop) {
              scrollBy(scrolledPastTop, 0, scrollBefore - scrolledPastTop.scrollTop);
            }

            parentEl = dragEl.parentNode; // actualization
            // must be done before animation

            if (targetBeforeFirstSwap !== undefined && !isCircumstantialInvert) {
              targetMoveDistance = Math.abs(targetBeforeFirstSwap - getRect(target)[side1]);
            }

            changed();
            return completed(true);
          }
        }

        if (el.contains(dragEl)) {
          return completed(false);
        }
      }

      return false;
    },
    _ignoreWhileAnimating: null,
    _offMoveEvents: function _offMoveEvents() {
      off(document, 'mousemove', this._onTouchMove);
      off(document, 'touchmove', this._onTouchMove);
      off(document, 'pointermove', this._onTouchMove);
      off(document, 'dragover', nearestEmptyInsertDetectEvent);
      off(document, 'mousemove', nearestEmptyInsertDetectEvent);
      off(document, 'touchmove', nearestEmptyInsertDetectEvent);
    },
    _offUpEvents: function _offUpEvents() {
      var ownerDocument = this.el.ownerDocument;
      off(ownerDocument, 'mouseup', this._onDrop);
      off(ownerDocument, 'touchend', this._onDrop);
      off(ownerDocument, 'pointerup', this._onDrop);
      off(ownerDocument, 'touchcancel', this._onDrop);
      off(document, 'selectstart', this);
    },
    _onDrop: function _onDrop(
    /**Event*/
    evt) {
      var el = this.el,
          options = this.options; // Get the index of the dragged element within its parent

      newIndex = index(dragEl);
      newDraggableIndex = index(dragEl, options.draggable);
      pluginEvent('drop', this, {
        evt: evt
      });
      parentEl = dragEl && dragEl.parentNode; // Get again after plugin event

      newIndex = index(dragEl);
      newDraggableIndex = index(dragEl, options.draggable);

      if (Sortable.eventCanceled) {
        this._nulling();

        return;
      }

      awaitingDragStarted = false;
      isCircumstantialInvert = false;
      pastFirstInvertThresh = false;
      clearInterval(this._loopId);
      clearTimeout(this._dragStartTimer);

      _cancelNextTick(this.cloneId);

      _cancelNextTick(this._dragStartId); // Unbind events


      if (this.nativeDraggable) {
        off(document, 'drop', this);
        off(el, 'dragstart', this._onDragStart);
      }

      this._offMoveEvents();

      this._offUpEvents();

      if (Safari) {
        css(document.body, 'user-select', '');
      }

      css(dragEl, 'transform', '');

      if (evt) {
        if (moved) {
          evt.cancelable && evt.preventDefault();
          !options.dropBubble && evt.stopPropagation();
        }

        ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

        if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
          // Remove clone(s)
          cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
        }

        if (dragEl) {
          if (this.nativeDraggable) {
            off(dragEl, 'dragend', this);
          }

          _disableDraggable(dragEl);

          dragEl.style['will-change'] = ''; // Remove classes
          // ghostClass is added in dragStarted

          if (moved && !awaitingDragStarted) {
            toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
          }

          toggleClass(dragEl, this.options.chosenClass, false); // Drag stop event

          _dispatchEvent({
            sortable: this,
            name: 'unchoose',
            toEl: parentEl,
            newIndex: null,
            newDraggableIndex: null,
            originalEvent: evt
          });

          if (rootEl !== parentEl) {
            if (newIndex >= 0) {
              // Add event
              _dispatchEvent({
                rootEl: parentEl,
                name: 'add',
                toEl: parentEl,
                fromEl: rootEl,
                originalEvent: evt
              }); // Remove event


              _dispatchEvent({
                sortable: this,
                name: 'remove',
                toEl: parentEl,
                originalEvent: evt
              }); // drag from one list and drop into another


              _dispatchEvent({
                rootEl: parentEl,
                name: 'sort',
                toEl: parentEl,
                fromEl: rootEl,
                originalEvent: evt
              });

              _dispatchEvent({
                sortable: this,
                name: 'sort',
                toEl: parentEl,
                originalEvent: evt
              });
            }

            putSortable && putSortable.save();
          } else {
            if (newIndex !== oldIndex) {
              if (newIndex >= 0) {
                // drag & drop within the same list
                _dispatchEvent({
                  sortable: this,
                  name: 'update',
                  toEl: parentEl,
                  originalEvent: evt
                });

                _dispatchEvent({
                  sortable: this,
                  name: 'sort',
                  toEl: parentEl,
                  originalEvent: evt
                });
              }
            }
          }

          if (Sortable.active) {
            /* jshint eqnull:true */
            if (newIndex == null || newIndex === -1) {
              newIndex = oldIndex;
              newDraggableIndex = oldDraggableIndex;
            }

            _dispatchEvent({
              sortable: this,
              name: 'end',
              toEl: parentEl,
              originalEvent: evt
            }); // Save sorting


            this.save();
          }
        }
      }

      this._nulling();
    },
    _nulling: function _nulling() {
      pluginEvent('nulling', this);
      rootEl = dragEl = parentEl = ghostEl = nextEl = cloneEl = lastDownEl = cloneHidden = tapEvt = touchEvt = moved = newIndex = newDraggableIndex = oldIndex = oldDraggableIndex = lastTarget = lastDirection = putSortable = activeGroup = Sortable.dragged = Sortable.ghost = Sortable.clone = Sortable.active = null;
      savedInputChecked.forEach(function (el) {
        el.checked = true;
      });
      savedInputChecked.length = lastDx = lastDy = 0;
    },
    handleEvent: function handleEvent(
    /**Event*/
    evt) {
      switch (evt.type) {
        case 'drop':
        case 'dragend':
          this._onDrop(evt);

          break;

        case 'dragenter':
        case 'dragover':
          if (dragEl) {
            this._onDragOver(evt);

            _globalDragOver(evt);
          }

          break;

        case 'selectstart':
          evt.preventDefault();
          break;
      }
    },

    /**
     * Serializes the item into an array of string.
     * @returns {String[]}
     */
    toArray: function toArray() {
      var order = [],
          el,
          children = this.el.children,
          i = 0,
          n = children.length,
          options = this.options;

      for (; i < n; i++) {
        el = children[i];

        if (closest(el, options.draggable, this.el, false)) {
          order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
        }
      }

      return order;
    },

    /**
     * Sorts the elements according to the array.
     * @param  {String[]}  order  order of the items
     */
    sort: function sort(order, useAnimation) {
      var items = {},
          rootEl = this.el;
      this.toArray().forEach(function (id, i) {
        var el = rootEl.children[i];

        if (closest(el, this.options.draggable, rootEl, false)) {
          items[id] = el;
        }
      }, this);
      useAnimation && this.captureAnimationState();
      order.forEach(function (id) {
        if (items[id]) {
          rootEl.removeChild(items[id]);
          rootEl.appendChild(items[id]);
        }
      });
      useAnimation && this.animateAll();
    },

    /**
     * Save the current sorting
     */
    save: function save() {
      var store = this.options.store;
      store && store.set && store.set(this);
    },

    /**
     * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
     * @param   {HTMLElement}  el
     * @param   {String}       [selector]  default: `options.draggable`
     * @returns {HTMLElement|null}
     */
    closest: function closest$1(el, selector) {
      return closest(el, selector || this.options.draggable, this.el, false);
    },

    /**
     * Set/get option
     * @param   {string} name
     * @param   {*}      [value]
     * @returns {*}
     */
    option: function option(name, value) {
      var options = this.options;

      if (value === void 0) {
        return options[name];
      } else {
        var modifiedValue = PluginManager.modifyOption(this, name, value);

        if (typeof modifiedValue !== 'undefined') {
          options[name] = modifiedValue;
        } else {
          options[name] = value;
        }

        if (name === 'group') {
          _prepareGroup(options);
        }
      }
    },

    /**
     * Destroy
     */
    destroy: function destroy() {
      pluginEvent('destroy', this);
      var el = this.el;
      el[expando] = null;
      off(el, 'mousedown', this._onTapStart);
      off(el, 'touchstart', this._onTapStart);
      off(el, 'pointerdown', this._onTapStart);

      if (this.nativeDraggable) {
        off(el, 'dragover', this);
        off(el, 'dragenter', this);
      } // Remove draggable attributes


      Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
        el.removeAttribute('draggable');
      });

      this._onDrop();

      this._disableDelayedDragEvents();

      sortables.splice(sortables.indexOf(this.el), 1);
      this.el = el = null;
    },
    _hideClone: function _hideClone() {
      if (!cloneHidden) {
        pluginEvent('hideClone', this);
        if (Sortable.eventCanceled) return;
        css(cloneEl, 'display', 'none');

        if (this.options.removeCloneOnHide && cloneEl.parentNode) {
          cloneEl.parentNode.removeChild(cloneEl);
        }

        cloneHidden = true;
      }
    },
    _showClone: function _showClone(putSortable) {
      if (putSortable.lastPutMode !== 'clone') {
        this._hideClone();

        return;
      }

      if (cloneHidden) {
        pluginEvent('showClone', this);
        if (Sortable.eventCanceled) return; // show clone at dragEl or original position

        if (dragEl.parentNode == rootEl && !this.options.group.revertClone) {
          rootEl.insertBefore(cloneEl, dragEl);
        } else if (nextEl) {
          rootEl.insertBefore(cloneEl, nextEl);
        } else {
          rootEl.appendChild(cloneEl);
        }

        if (this.options.group.revertClone) {
          this.animate(dragEl, cloneEl);
        }

        css(cloneEl, 'display', '');
        cloneHidden = false;
      }
    }
  };

  function _globalDragOver(
  /**Event*/
  evt) {
    if (evt.dataTransfer) {
      evt.dataTransfer.dropEffect = 'move';
    }

    evt.cancelable && evt.preventDefault();
  }

  function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvent, willInsertAfter) {
    var evt,
        sortable = fromEl[expando],
        onMoveFn = sortable.options.onMove,
        retVal; // Support for new CustomEvent feature

    if (window.CustomEvent && !IE11OrLess && !Edge) {
      evt = new CustomEvent('move', {
        bubbles: true,
        cancelable: true
      });
    } else {
      evt = document.createEvent('Event');
      evt.initEvent('move', true, true);
    }

    evt.to = toEl;
    evt.from = fromEl;
    evt.dragged = dragEl;
    evt.draggedRect = dragRect;
    evt.related = targetEl || toEl;
    evt.relatedRect = targetRect || getRect(toEl);
    evt.willInsertAfter = willInsertAfter;
    evt.originalEvent = originalEvent;
    fromEl.dispatchEvent(evt);

    if (onMoveFn) {
      retVal = onMoveFn.call(sortable, evt, originalEvent);
    }

    return retVal;
  }

  function _disableDraggable(el) {
    el.draggable = false;
  }

  function _unsilent() {
    _silent = false;
  }

  function _ghostIsLast(evt, vertical, sortable) {
    var rect = getRect(lastChild(sortable.el, sortable.options.draggable));
    var spacer = 10;
    return vertical ? evt.clientX > rect.right + spacer || evt.clientX <= rect.right && evt.clientY > rect.bottom && evt.clientX >= rect.left : evt.clientX > rect.right && evt.clientY > rect.top || evt.clientX <= rect.right && evt.clientY > rect.bottom + spacer;
  }

  function _getSwapDirection(evt, target, targetRect, vertical, swapThreshold, invertedSwapThreshold, invertSwap, isLastTarget) {
    var mouseOnAxis = vertical ? evt.clientY : evt.clientX,
        targetLength = vertical ? targetRect.height : targetRect.width,
        targetS1 = vertical ? targetRect.top : targetRect.left,
        targetS2 = vertical ? targetRect.bottom : targetRect.right,
        invert = false;

    if (!invertSwap) {
      // Never invert or create dragEl shadow when target movemenet causes mouse to move past the end of regular swapThreshold
      if (isLastTarget && targetMoveDistance < targetLength * swapThreshold) {
        // multiplied only by swapThreshold because mouse will already be inside target by (1 - threshold) * targetLength / 2
        // check if past first invert threshold on side opposite of lastDirection
        if (!pastFirstInvertThresh && (lastDirection === 1 ? mouseOnAxis > targetS1 + targetLength * invertedSwapThreshold / 2 : mouseOnAxis < targetS2 - targetLength * invertedSwapThreshold / 2)) {
          // past first invert threshold, do not restrict inverted threshold to dragEl shadow
          pastFirstInvertThresh = true;
        }

        if (!pastFirstInvertThresh) {
          // dragEl shadow (target move distance shadow)
          if (lastDirection === 1 ? mouseOnAxis < targetS1 + targetMoveDistance // over dragEl shadow
          : mouseOnAxis > targetS2 - targetMoveDistance) {
            return -lastDirection;
          }
        } else {
          invert = true;
        }
      } else {
        // Regular
        if (mouseOnAxis > targetS1 + targetLength * (1 - swapThreshold) / 2 && mouseOnAxis < targetS2 - targetLength * (1 - swapThreshold) / 2) {
          return _getInsertDirection(target);
        }
      }
    }

    invert = invert || invertSwap;

    if (invert) {
      // Invert of regular
      if (mouseOnAxis < targetS1 + targetLength * invertedSwapThreshold / 2 || mouseOnAxis > targetS2 - targetLength * invertedSwapThreshold / 2) {
        return mouseOnAxis > targetS1 + targetLength / 2 ? 1 : -1;
      }
    }

    return 0;
  }
  /**
   * Gets the direction dragEl must be swapped relative to target in order to make it
   * seem that dragEl has been "inserted" into that element's position
   * @param  {HTMLElement} target       The target whose position dragEl is being inserted at
   * @return {Number}                   Direction dragEl must be swapped
   */


  function _getInsertDirection(target) {
    if (index(dragEl) < index(target)) {
      return 1;
    } else {
      return -1;
    }
  }
  /**
   * Generate id
   * @param   {HTMLElement} el
   * @returns {String}
   * @private
   */


  function _generateId(el) {
    var str = el.tagName + el.className + el.src + el.href + el.textContent,
        i = str.length,
        sum = 0;

    while (i--) {
      sum += str.charCodeAt(i);
    }

    return sum.toString(36);
  }

  function _saveInputCheckedState(root) {
    savedInputChecked.length = 0;
    var inputs = root.getElementsByTagName('input');
    var idx = inputs.length;

    while (idx--) {
      var el = inputs[idx];
      el.checked && savedInputChecked.push(el);
    }
  }

  function _nextTick(fn) {
    return setTimeout(fn, 0);
  }

  function _cancelNextTick(id) {
    return clearTimeout(id);
  } // Fixed #973:


  if (documentExists) {
    on(document, 'touchmove', function (evt) {
      if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
        evt.preventDefault();
      }
    });
  } // Export utils


  Sortable.utils = {
    on: on,
    off: off,
    css: css,
    find: find,
    is: function is(el, selector) {
      return !!closest(el, selector, el, false);
    },
    extend: extend,
    throttle: throttle,
    closest: closest,
    toggleClass: toggleClass,
    clone: clone,
    index: index,
    nextTick: _nextTick,
    cancelNextTick: _cancelNextTick,
    detectDirection: _detectDirection,
    getChild: getChild
  };
  /**
   * Get the Sortable instance of an element
   * @param  {HTMLElement} element The element
   * @return {Sortable|undefined}         The instance of Sortable
   */

  Sortable.get = function (element) {
    return element[expando];
  };
  /**
   * Mount a plugin to Sortable
   * @param  {...SortablePlugin|SortablePlugin[]} plugins       Plugins being mounted
   */


  Sortable.mount = function () {
    for (var _len = arguments.length, plugins = new Array(_len), _key = 0; _key < _len; _key++) {
      plugins[_key] = arguments[_key];
    }

    if (plugins[0].constructor === Array) plugins = plugins[0];
    plugins.forEach(function (plugin) {
      if (!plugin.prototype || !plugin.prototype.constructor) {
        throw "Sortable: Mounted plugin must be a constructor function, not ".concat({}.toString.call(plugin));
      }

      if (plugin.utils) Sortable.utils = _objectSpread({}, Sortable.utils, plugin.utils);
      PluginManager.mount(plugin);
    });
  };
  /**
   * Create sortable instance
   * @param {HTMLElement}  el
   * @param {Object}      [options]
   */


  Sortable.create = function (el, options) {
    return new Sortable(el, options);
  }; // Export


  Sortable.version = version;

  var autoScrolls = [],
      scrollEl,
      scrollRootEl,
      scrolling = false,
      lastAutoScrollX,
      lastAutoScrollY,
      touchEvt$1,
      pointerElemChangedInterval;

  function AutoScrollPlugin() {
    function AutoScroll() {
      this.defaults = {
        scroll: true,
        scrollSensitivity: 30,
        scrollSpeed: 10,
        bubbleScroll: true
      }; // Bind all private methods

      for (var fn in this) {
        if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
          this[fn] = this[fn].bind(this);
        }
      }
    }

    AutoScroll.prototype = {
      dragStarted: function dragStarted(_ref) {
        var originalEvent = _ref.originalEvent;

        if (this.sortable.nativeDraggable) {
          on(document, 'dragover', this._handleAutoScroll);
        } else {
          if (this.options.supportPointer) {
            on(document, 'pointermove', this._handleFallbackAutoScroll);
          } else if (originalEvent.touches) {
            on(document, 'touchmove', this._handleFallbackAutoScroll);
          } else {
            on(document, 'mousemove', this._handleFallbackAutoScroll);
          }
        }
      },
      dragOverCompleted: function dragOverCompleted(_ref2) {
        var originalEvent = _ref2.originalEvent;

        // For when bubbling is canceled and using fallback (fallback 'touchmove' always reached)
        if (!this.options.dragOverBubble && !originalEvent.rootEl) {
          this._handleAutoScroll(originalEvent);
        }
      },
      drop: function drop() {
        if (this.sortable.nativeDraggable) {
          off(document, 'dragover', this._handleAutoScroll);
        } else {
          off(document, 'pointermove', this._handleFallbackAutoScroll);
          off(document, 'touchmove', this._handleFallbackAutoScroll);
          off(document, 'mousemove', this._handleFallbackAutoScroll);
        }

        clearPointerElemChangedInterval();
        clearAutoScrolls();
        cancelThrottle();
      },
      nulling: function nulling() {
        touchEvt$1 = scrollRootEl = scrollEl = scrolling = pointerElemChangedInterval = lastAutoScrollX = lastAutoScrollY = null;
        autoScrolls.length = 0;
      },
      _handleFallbackAutoScroll: function _handleFallbackAutoScroll(evt) {
        this._handleAutoScroll(evt, true);
      },
      _handleAutoScroll: function _handleAutoScroll(evt, fallback) {
        var _this = this;

        var x = (evt.touches ? evt.touches[0] : evt).clientX,
            y = (evt.touches ? evt.touches[0] : evt).clientY,
            elem = document.elementFromPoint(x, y);
        touchEvt$1 = evt; // IE does not seem to have native autoscroll,
        // Edge's autoscroll seems too conditional,
        // MACOS Safari does not have autoscroll,
        // Firefox and Chrome are good

        if (fallback || Edge || IE11OrLess || Safari) {
          autoScroll(evt, this.options, elem, fallback); // Listener for pointer element change

          var ogElemScroller = getParentAutoScrollElement(elem, true);

          if (scrolling && (!pointerElemChangedInterval || x !== lastAutoScrollX || y !== lastAutoScrollY)) {
            pointerElemChangedInterval && clearPointerElemChangedInterval(); // Detect for pointer elem change, emulating native DnD behaviour

            pointerElemChangedInterval = setInterval(function () {
              var newElem = getParentAutoScrollElement(document.elementFromPoint(x, y), true);

              if (newElem !== ogElemScroller) {
                ogElemScroller = newElem;
                clearAutoScrolls();
              }

              autoScroll(evt, _this.options, newElem, fallback);
            }, 10);
            lastAutoScrollX = x;
            lastAutoScrollY = y;
          }
        } else {
          // if DnD is enabled (and browser has good autoscrolling), first autoscroll will already scroll, so get parent autoscroll of first autoscroll
          if (!this.options.bubbleScroll || getParentAutoScrollElement(elem, true) === getWindowScrollingElement()) {
            clearAutoScrolls();
            return;
          }

          autoScroll(evt, this.options, getParentAutoScrollElement(elem, false), false);
        }
      }
    };
    return _extends(AutoScroll, {
      pluginName: 'scroll',
      initializeByDefault: true
    });
  }

  function clearAutoScrolls() {
    autoScrolls.forEach(function (autoScroll) {
      clearInterval(autoScroll.pid);
    });
    autoScrolls = [];
  }

  function clearPointerElemChangedInterval() {
    clearInterval(pointerElemChangedInterval);
  }

  var autoScroll = throttle(function (evt, options, rootEl, isFallback) {
    // Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
    if (!options.scroll) return;
    var x = (evt.touches ? evt.touches[0] : evt).clientX,
        y = (evt.touches ? evt.touches[0] : evt).clientY,
        sens = options.scrollSensitivity,
        speed = options.scrollSpeed,
        winScroller = getWindowScrollingElement();
    var scrollThisInstance = false,
        scrollCustomFn; // New scroll root, set scrollEl

    if (scrollRootEl !== rootEl) {
      scrollRootEl = rootEl;
      clearAutoScrolls();
      scrollEl = options.scroll;
      scrollCustomFn = options.scrollFn;

      if (scrollEl === true) {
        scrollEl = getParentAutoScrollElement(rootEl, true);
      }
    }

    var layersOut = 0;
    var currentParent = scrollEl;

    do {
      var el = currentParent,
          rect = getRect(el),
          top = rect.top,
          bottom = rect.bottom,
          left = rect.left,
          right = rect.right,
          width = rect.width,
          height = rect.height,
          canScrollX = void 0,
          canScrollY = void 0,
          scrollWidth = el.scrollWidth,
          scrollHeight = el.scrollHeight,
          elCSS = css(el),
          scrollPosX = el.scrollLeft,
          scrollPosY = el.scrollTop;

      if (el === winScroller) {
        canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll' || elCSS.overflowX === 'visible');
        canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll' || elCSS.overflowY === 'visible');
      } else {
        canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll');
        canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll');
      }

      var vx = canScrollX && (Math.abs(right - x) <= sens && scrollPosX + width < scrollWidth) - (Math.abs(left - x) <= sens && !!scrollPosX);
      var vy = canScrollY && (Math.abs(bottom - y) <= sens && scrollPosY + height < scrollHeight) - (Math.abs(top - y) <= sens && !!scrollPosY);

      if (!autoScrolls[layersOut]) {
        for (var i = 0; i <= layersOut; i++) {
          if (!autoScrolls[i]) {
            autoScrolls[i] = {};
          }
        }
      }

      if (autoScrolls[layersOut].vx != vx || autoScrolls[layersOut].vy != vy || autoScrolls[layersOut].el !== el) {
        autoScrolls[layersOut].el = el;
        autoScrolls[layersOut].vx = vx;
        autoScrolls[layersOut].vy = vy;
        clearInterval(autoScrolls[layersOut].pid);

        if (vx != 0 || vy != 0) {
          scrollThisInstance = true;
          /* jshint loopfunc:true */

          autoScrolls[layersOut].pid = setInterval(function () {
            // emulate drag over during autoscroll (fallback), emulating native DnD behaviour
            if (isFallback && this.layer === 0) {
              Sortable.active._onTouchMove(touchEvt$1); // To move ghost if it is positioned absolutely

            }

            var scrollOffsetY = autoScrolls[this.layer].vy ? autoScrolls[this.layer].vy * speed : 0;
            var scrollOffsetX = autoScrolls[this.layer].vx ? autoScrolls[this.layer].vx * speed : 0;

            if (typeof scrollCustomFn === 'function') {
              if (scrollCustomFn.call(Sortable.dragged.parentNode[expando], scrollOffsetX, scrollOffsetY, evt, touchEvt$1, autoScrolls[this.layer].el) !== 'continue') {
                return;
              }
            }

            scrollBy(autoScrolls[this.layer].el, scrollOffsetX, scrollOffsetY);
          }.bind({
            layer: layersOut
          }), 24);
        }
      }

      layersOut++;
    } while (options.bubbleScroll && currentParent !== winScroller && (currentParent = getParentAutoScrollElement(currentParent, false)));

    scrolling = scrollThisInstance; // in case another function catches scrolling as false in between when it is not
  }, 30);

  var drop = function drop(_ref) {
    var originalEvent = _ref.originalEvent,
        putSortable = _ref.putSortable,
        dragEl = _ref.dragEl,
        activeSortable = _ref.activeSortable,
        dispatchSortableEvent = _ref.dispatchSortableEvent,
        hideGhostForTarget = _ref.hideGhostForTarget,
        unhideGhostForTarget = _ref.unhideGhostForTarget;
    if (!originalEvent) return;
    var toSortable = putSortable || activeSortable;
    hideGhostForTarget();
    var touch = originalEvent.changedTouches && originalEvent.changedTouches.length ? originalEvent.changedTouches[0] : originalEvent;
    var target = document.elementFromPoint(touch.clientX, touch.clientY);
    unhideGhostForTarget();

    if (toSortable && !toSortable.el.contains(target)) {
      dispatchSortableEvent('spill');
      this.onSpill({
        dragEl: dragEl,
        putSortable: putSortable
      });
    }
  };

  function Revert() {}

  Revert.prototype = {
    startIndex: null,
    dragStart: function dragStart(_ref2) {
      var oldDraggableIndex = _ref2.oldDraggableIndex;
      this.startIndex = oldDraggableIndex;
    },
    onSpill: function onSpill(_ref3) {
      var dragEl = _ref3.dragEl,
          putSortable = _ref3.putSortable;
      this.sortable.captureAnimationState();

      if (putSortable) {
        putSortable.captureAnimationState();
      }

      var nextSibling = getChild(this.sortable.el, this.startIndex, this.options);

      if (nextSibling) {
        this.sortable.el.insertBefore(dragEl, nextSibling);
      } else {
        this.sortable.el.appendChild(dragEl);
      }

      this.sortable.animateAll();

      if (putSortable) {
        putSortable.animateAll();
      }
    },
    drop: drop
  };

  _extends(Revert, {
    pluginName: 'revertOnSpill'
  });

  function Remove() {}

  Remove.prototype = {
    onSpill: function onSpill(_ref4) {
      var dragEl = _ref4.dragEl,
          putSortable = _ref4.putSortable;
      var parentSortable = putSortable || this.sortable;
      parentSortable.captureAnimationState();
      dragEl.parentNode && dragEl.parentNode.removeChild(dragEl);
      parentSortable.animateAll();
    },
    drop: drop
  };

  _extends(Remove, {
    pluginName: 'removeOnSpill'
  });

  var lastSwapEl;

  function SwapPlugin() {
    function Swap() {
      this.defaults = {
        swapClass: 'sortable-swap-highlight'
      };
    }

    Swap.prototype = {
      dragStart: function dragStart(_ref) {
        var dragEl = _ref.dragEl;
        lastSwapEl = dragEl;
      },
      dragOverValid: function dragOverValid(_ref2) {
        var completed = _ref2.completed,
            target = _ref2.target,
            onMove = _ref2.onMove,
            activeSortable = _ref2.activeSortable,
            changed = _ref2.changed,
            cancel = _ref2.cancel;
        if (!activeSortable.options.swap) return;
        var el = this.sortable.el,
            options = this.options;

        if (target && target !== el) {
          var prevSwapEl = lastSwapEl;

          if (onMove(target) !== false) {
            toggleClass(target, options.swapClass, true);
            lastSwapEl = target;
          } else {
            lastSwapEl = null;
          }

          if (prevSwapEl && prevSwapEl !== lastSwapEl) {
            toggleClass(prevSwapEl, options.swapClass, false);
          }
        }

        changed();
        completed(true);
        cancel();
      },
      drop: function drop(_ref3) {
        var activeSortable = _ref3.activeSortable,
            putSortable = _ref3.putSortable,
            dragEl = _ref3.dragEl;
        var toSortable = putSortable || this.sortable;
        var options = this.options;
        lastSwapEl && toggleClass(lastSwapEl, options.swapClass, false);

        if (lastSwapEl && (options.swap || putSortable && putSortable.options.swap)) {
          if (dragEl !== lastSwapEl) {
            toSortable.captureAnimationState();
            if (toSortable !== activeSortable) activeSortable.captureAnimationState();
            swapNodes(dragEl, lastSwapEl);
            toSortable.animateAll();
            if (toSortable !== activeSortable) activeSortable.animateAll();
          }
        }
      },
      nulling: function nulling() {
        lastSwapEl = null;
      }
    };
    return _extends(Swap, {
      pluginName: 'swap',
      eventProperties: function eventProperties() {
        return {
          swapItem: lastSwapEl
        };
      }
    });
  }

  function swapNodes(n1, n2) {
    var p1 = n1.parentNode,
        p2 = n2.parentNode,
        i1,
        i2;
    if (!p1 || !p2 || p1.isEqualNode(n2) || p2.isEqualNode(n1)) return;
    i1 = index(n1);
    i2 = index(n2);

    if (p1.isEqualNode(p2) && i1 < i2) {
      i2++;
    }

    p1.insertBefore(n2, p1.children[i1]);
    p2.insertBefore(n1, p2.children[i2]);
  }

  var multiDragElements = [],
      multiDragClones = [],
      lastMultiDragSelect,
      // for selection with modifier key down (SHIFT)
  multiDragSortable,
      initialFolding = false,
      // Initial multi-drag fold when drag started
  folding = false,
      // Folding any other time
  dragStarted = false,
      dragEl$1,
      clonesFromRect,
      clonesHidden;

  function MultiDragPlugin() {
    function MultiDrag(sortable) {
      // Bind all private methods
      for (var fn in this) {
        if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
          this[fn] = this[fn].bind(this);
        }
      }

      if (sortable.options.supportPointer) {
        on(document, 'pointerup', this._deselectMultiDrag);
      } else {
        on(document, 'mouseup', this._deselectMultiDrag);
        on(document, 'touchend', this._deselectMultiDrag);
      }

      on(document, 'keydown', this._checkKeyDown);
      on(document, 'keyup', this._checkKeyUp);
      this.defaults = {
        selectedClass: 'sortable-selected',
        multiDragKey: null,
        setData: function setData(dataTransfer, dragEl) {
          var data = '';

          if (multiDragElements.length && multiDragSortable === sortable) {
            multiDragElements.forEach(function (multiDragElement, i) {
              data += (!i ? '' : ', ') + multiDragElement.textContent;
            });
          } else {
            data = dragEl.textContent;
          }

          dataTransfer.setData('Text', data);
        }
      };
    }

    MultiDrag.prototype = {
      multiDragKeyDown: false,
      isMultiDrag: false,
      delayStartGlobal: function delayStartGlobal(_ref) {
        var dragged = _ref.dragEl;
        dragEl$1 = dragged;
      },
      delayEnded: function delayEnded() {
        this.isMultiDrag = ~multiDragElements.indexOf(dragEl$1);
      },
      setupClone: function setupClone(_ref2) {
        var sortable = _ref2.sortable,
            cancel = _ref2.cancel;
        if (!this.isMultiDrag) return;

        for (var i = 0; i < multiDragElements.length; i++) {
          multiDragClones.push(clone(multiDragElements[i]));
          multiDragClones[i].sortableIndex = multiDragElements[i].sortableIndex;
          multiDragClones[i].draggable = false;
          multiDragClones[i].style['will-change'] = '';
          toggleClass(multiDragClones[i], this.options.selectedClass, false);
          multiDragElements[i] === dragEl$1 && toggleClass(multiDragClones[i], this.options.chosenClass, false);
        }

        sortable._hideClone();

        cancel();
      },
      clone: function clone(_ref3) {
        var sortable = _ref3.sortable,
            rootEl = _ref3.rootEl,
            dispatchSortableEvent = _ref3.dispatchSortableEvent,
            cancel = _ref3.cancel;
        if (!this.isMultiDrag) return;

        if (!this.options.removeCloneOnHide) {
          if (multiDragElements.length && multiDragSortable === sortable) {
            insertMultiDragClones(true, rootEl);
            dispatchSortableEvent('clone');
            cancel();
          }
        }
      },
      showClone: function showClone(_ref4) {
        var cloneNowShown = _ref4.cloneNowShown,
            rootEl = _ref4.rootEl,
            cancel = _ref4.cancel;
        if (!this.isMultiDrag) return;
        insertMultiDragClones(false, rootEl);
        multiDragClones.forEach(function (clone) {
          css(clone, 'display', '');
        });
        cloneNowShown();
        clonesHidden = false;
        cancel();
      },
      hideClone: function hideClone(_ref5) {
        var _this = this;

        var sortable = _ref5.sortable,
            cloneNowHidden = _ref5.cloneNowHidden,
            cancel = _ref5.cancel;
        if (!this.isMultiDrag) return;
        multiDragClones.forEach(function (clone) {
          css(clone, 'display', 'none');

          if (_this.options.removeCloneOnHide && clone.parentNode) {
            clone.parentNode.removeChild(clone);
          }
        });
        cloneNowHidden();
        clonesHidden = true;
        cancel();
      },
      dragStartGlobal: function dragStartGlobal(_ref6) {
        var sortable = _ref6.sortable;

        if (!this.isMultiDrag && multiDragSortable) {
          multiDragSortable.multiDrag._deselectMultiDrag();
        }

        multiDragElements.forEach(function (multiDragElement) {
          multiDragElement.sortableIndex = index(multiDragElement);
        }); // Sort multi-drag elements

        multiDragElements = multiDragElements.sort(function (a, b) {
          return a.sortableIndex - b.sortableIndex;
        });
        dragStarted = true;
      },
      dragStarted: function dragStarted(_ref7) {
        var _this2 = this;

        var sortable = _ref7.sortable;
        if (!this.isMultiDrag) return;

        if (this.options.sort) {
          // Capture rects,
          // hide multi drag elements (by positioning them absolute),
          // set multi drag elements rects to dragRect,
          // show multi drag elements,
          // animate to rects,
          // unset rects & remove from DOM
          sortable.captureAnimationState();

          if (this.options.animation) {
            multiDragElements.forEach(function (multiDragElement) {
              if (multiDragElement === dragEl$1) return;
              css(multiDragElement, 'position', 'absolute');
            });
            var dragRect = getRect(dragEl$1, false, true, true);
            multiDragElements.forEach(function (multiDragElement) {
              if (multiDragElement === dragEl$1) return;
              setRect(multiDragElement, dragRect);
            });
            folding = true;
            initialFolding = true;
          }
        }

        sortable.animateAll(function () {
          folding = false;
          initialFolding = false;

          if (_this2.options.animation) {
            multiDragElements.forEach(function (multiDragElement) {
              unsetRect(multiDragElement);
            });
          } // Remove all auxiliary multidrag items from el, if sorting enabled


          if (_this2.options.sort) {
            removeMultiDragElements();
          }
        });
      },
      dragOver: function dragOver(_ref8) {
        var target = _ref8.target,
            completed = _ref8.completed,
            cancel = _ref8.cancel;

        if (folding && ~multiDragElements.indexOf(target)) {
          completed(false);
          cancel();
        }
      },
      revert: function revert(_ref9) {
        var fromSortable = _ref9.fromSortable,
            rootEl = _ref9.rootEl,
            sortable = _ref9.sortable,
            dragRect = _ref9.dragRect;

        if (multiDragElements.length > 1) {
          // Setup unfold animation
          multiDragElements.forEach(function (multiDragElement) {
            sortable.addAnimationState({
              target: multiDragElement,
              rect: folding ? getRect(multiDragElement) : dragRect
            });
            unsetRect(multiDragElement);
            multiDragElement.fromRect = dragRect;
            fromSortable.removeAnimationState(multiDragElement);
          });
          folding = false;
          insertMultiDragElements(!this.options.removeCloneOnHide, rootEl);
        }
      },
      dragOverCompleted: function dragOverCompleted(_ref10) {
        var sortable = _ref10.sortable,
            isOwner = _ref10.isOwner,
            insertion = _ref10.insertion,
            activeSortable = _ref10.activeSortable,
            parentEl = _ref10.parentEl,
            putSortable = _ref10.putSortable;
        var options = this.options;

        if (insertion) {
          // Clones must be hidden before folding animation to capture dragRectAbsolute properly
          if (isOwner) {
            activeSortable._hideClone();
          }

          initialFolding = false; // If leaving sort:false root, or already folding - Fold to new location

          if (options.animation && multiDragElements.length > 1 && (folding || !isOwner && !activeSortable.options.sort && !putSortable)) {
            // Fold: Set all multi drag elements's rects to dragEl's rect when multi-drag elements are invisible
            var dragRectAbsolute = getRect(dragEl$1, false, true, true);
            multiDragElements.forEach(function (multiDragElement) {
              if (multiDragElement === dragEl$1) return;
              setRect(multiDragElement, dragRectAbsolute); // Move element(s) to end of parentEl so that it does not interfere with multi-drag clones insertion if they are inserted
              // while folding, and so that we can capture them again because old sortable will no longer be fromSortable

              parentEl.appendChild(multiDragElement);
            });
            folding = true;
          } // Clones must be shown (and check to remove multi drags) after folding when interfering multiDragElements are moved out


          if (!isOwner) {
            // Only remove if not folding (folding will remove them anyways)
            if (!folding) {
              removeMultiDragElements();
            }

            if (multiDragElements.length > 1) {
              var clonesHiddenBefore = clonesHidden;

              activeSortable._showClone(sortable); // Unfold animation for clones if showing from hidden


              if (activeSortable.options.animation && !clonesHidden && clonesHiddenBefore) {
                multiDragClones.forEach(function (clone) {
                  activeSortable.addAnimationState({
                    target: clone,
                    rect: clonesFromRect
                  });
                  clone.fromRect = clonesFromRect;
                  clone.thisAnimationDuration = null;
                });
              }
            } else {
              activeSortable._showClone(sortable);
            }
          }
        }
      },
      dragOverAnimationCapture: function dragOverAnimationCapture(_ref11) {
        var dragRect = _ref11.dragRect,
            isOwner = _ref11.isOwner,
            activeSortable = _ref11.activeSortable;
        multiDragElements.forEach(function (multiDragElement) {
          multiDragElement.thisAnimationDuration = null;
        });

        if (activeSortable.options.animation && !isOwner && activeSortable.multiDrag.isMultiDrag) {
          clonesFromRect = _extends({}, dragRect);
          var dragMatrix = matrix(dragEl$1, true);
          clonesFromRect.top -= dragMatrix.f;
          clonesFromRect.left -= dragMatrix.e;
        }
      },
      dragOverAnimationComplete: function dragOverAnimationComplete() {
        if (folding) {
          folding = false;
          removeMultiDragElements();
        }
      },
      drop: function drop(_ref12) {
        var evt = _ref12.originalEvent,
            rootEl = _ref12.rootEl,
            parentEl = _ref12.parentEl,
            sortable = _ref12.sortable,
            dispatchSortableEvent = _ref12.dispatchSortableEvent,
            oldIndex = _ref12.oldIndex,
            putSortable = _ref12.putSortable;
        var toSortable = putSortable || this.sortable;
        if (!evt) return;
        var options = this.options,
            children = parentEl.children; // Multi-drag selection

        if (!dragStarted) {
          if (options.multiDragKey && !this.multiDragKeyDown) {
            this._deselectMultiDrag();
          }

          toggleClass(dragEl$1, options.selectedClass, !~multiDragElements.indexOf(dragEl$1));

          if (!~multiDragElements.indexOf(dragEl$1)) {
            multiDragElements.push(dragEl$1);
            dispatchEvent({
              sortable: sortable,
              rootEl: rootEl,
              name: 'select',
              targetEl: dragEl$1,
              originalEvt: evt
            }); // Modifier activated, select from last to dragEl

            if (evt.shiftKey && lastMultiDragSelect && sortable.el.contains(lastMultiDragSelect)) {
              var lastIndex = index(lastMultiDragSelect),
                  currentIndex = index(dragEl$1);

              if (~lastIndex && ~currentIndex && lastIndex !== currentIndex) {
                // Must include lastMultiDragSelect (select it), in case modified selection from no selection
                // (but previous selection existed)
                var n, i;

                if (currentIndex > lastIndex) {
                  i = lastIndex;
                  n = currentIndex;
                } else {
                  i = currentIndex;
                  n = lastIndex + 1;
                }

                for (; i < n; i++) {
                  if (~multiDragElements.indexOf(children[i])) continue;
                  toggleClass(children[i], options.selectedClass, true);
                  multiDragElements.push(children[i]);
                  dispatchEvent({
                    sortable: sortable,
                    rootEl: rootEl,
                    name: 'select',
                    targetEl: children[i],
                    originalEvt: evt
                  });
                }
              }
            } else {
              lastMultiDragSelect = dragEl$1;
            }

            multiDragSortable = toSortable;
          } else {
            multiDragElements.splice(multiDragElements.indexOf(dragEl$1), 1);
            lastMultiDragSelect = null;
            dispatchEvent({
              sortable: sortable,
              rootEl: rootEl,
              name: 'deselect',
              targetEl: dragEl$1,
              originalEvt: evt
            });
          }
        } // Multi-drag drop


        if (dragStarted && this.isMultiDrag) {
          // Do not "unfold" after around dragEl if reverted
          if ((parentEl[expando].options.sort || parentEl !== rootEl) && multiDragElements.length > 1) {
            var dragRect = getRect(dragEl$1),
                multiDragIndex = index(dragEl$1, ':not(.' + this.options.selectedClass + ')');
            if (!initialFolding && options.animation) dragEl$1.thisAnimationDuration = null;
            toSortable.captureAnimationState();

            if (!initialFolding) {
              if (options.animation) {
                dragEl$1.fromRect = dragRect;
                multiDragElements.forEach(function (multiDragElement) {
                  multiDragElement.thisAnimationDuration = null;

                  if (multiDragElement !== dragEl$1) {
                    var rect = folding ? getRect(multiDragElement) : dragRect;
                    multiDragElement.fromRect = rect; // Prepare unfold animation

                    toSortable.addAnimationState({
                      target: multiDragElement,
                      rect: rect
                    });
                  }
                });
              } // Multi drag elements are not necessarily removed from the DOM on drop, so to reinsert
              // properly they must all be removed


              removeMultiDragElements();
              multiDragElements.forEach(function (multiDragElement) {
                if (children[multiDragIndex]) {
                  parentEl.insertBefore(multiDragElement, children[multiDragIndex]);
                } else {
                  parentEl.appendChild(multiDragElement);
                }

                multiDragIndex++;
              }); // If initial folding is done, the elements may have changed position because they are now
              // unfolding around dragEl, even though dragEl may not have his index changed, so update event
              // must be fired here as Sortable will not.

              if (oldIndex === index(dragEl$1)) {
                var update = false;
                multiDragElements.forEach(function (multiDragElement) {
                  if (multiDragElement.sortableIndex !== index(multiDragElement)) {
                    update = true;
                    return;
                  }
                });

                if (update) {
                  dispatchSortableEvent('update');
                }
              }
            } // Must be done after capturing individual rects (scroll bar)


            multiDragElements.forEach(function (multiDragElement) {
              unsetRect(multiDragElement);
            });
            toSortable.animateAll();
          }

          multiDragSortable = toSortable;
        } // Remove clones if necessary


        if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
          multiDragClones.forEach(function (clone) {
            clone.parentNode && clone.parentNode.removeChild(clone);
          });
        }
      },
      nullingGlobal: function nullingGlobal() {
        this.isMultiDrag = dragStarted = false;
        multiDragClones.length = 0;
      },
      destroyGlobal: function destroyGlobal() {
        this._deselectMultiDrag();

        off(document, 'pointerup', this._deselectMultiDrag);
        off(document, 'mouseup', this._deselectMultiDrag);
        off(document, 'touchend', this._deselectMultiDrag);
        off(document, 'keydown', this._checkKeyDown);
        off(document, 'keyup', this._checkKeyUp);
      },
      _deselectMultiDrag: function _deselectMultiDrag(evt) {
        if (typeof dragStarted !== "undefined" && dragStarted) return; // Only deselect if selection is in this sortable

        if (multiDragSortable !== this.sortable) return; // Only deselect if target is not item in this sortable

        if (evt && closest(evt.target, this.options.draggable, this.sortable.el, false)) return; // Only deselect if left click

        if (evt && evt.button !== 0) return;

        while (multiDragElements.length) {
          var el = multiDragElements[0];
          toggleClass(el, this.options.selectedClass, false);
          multiDragElements.shift();
          dispatchEvent({
            sortable: this.sortable,
            rootEl: this.sortable.el,
            name: 'deselect',
            targetEl: el,
            originalEvt: evt
          });
        }
      },
      _checkKeyDown: function _checkKeyDown(evt) {
        if (evt.key === this.options.multiDragKey) {
          this.multiDragKeyDown = true;
        }
      },
      _checkKeyUp: function _checkKeyUp(evt) {
        if (evt.key === this.options.multiDragKey) {
          this.multiDragKeyDown = false;
        }
      }
    };
    return _extends(MultiDrag, {
      // Static methods & properties
      pluginName: 'multiDrag',
      utils: {
        /**
         * Selects the provided multi-drag item
         * @param  {HTMLElement} el    The element to be selected
         */
        select: function select(el) {
          var sortable = el.parentNode[expando];
          if (!sortable || !sortable.options.multiDrag || ~multiDragElements.indexOf(el)) return;

          if (multiDragSortable && multiDragSortable !== sortable) {
            multiDragSortable.multiDrag._deselectMultiDrag();

            multiDragSortable = sortable;
          }

          toggleClass(el, sortable.options.selectedClass, true);
          multiDragElements.push(el);
        },

        /**
         * Deselects the provided multi-drag item
         * @param  {HTMLElement} el    The element to be deselected
         */
        deselect: function deselect(el) {
          var sortable = el.parentNode[expando],
              index = multiDragElements.indexOf(el);
          if (!sortable || !sortable.options.multiDrag || !~index) return;
          toggleClass(el, sortable.options.selectedClass, false);
          multiDragElements.splice(index, 1);
        }
      },
      eventProperties: function eventProperties() {
        var _this3 = this;

        var oldIndicies = [],
            newIndicies = [];
        multiDragElements.forEach(function (multiDragElement) {
          oldIndicies.push({
            multiDragElement: multiDragElement,
            index: multiDragElement.sortableIndex
          }); // multiDragElements will already be sorted if folding

          var newIndex;

          if (folding && multiDragElement !== dragEl$1) {
            newIndex = -1;
          } else if (folding) {
            newIndex = index(multiDragElement, ':not(.' + _this3.options.selectedClass + ')');
          } else {
            newIndex = index(multiDragElement);
          }

          newIndicies.push({
            multiDragElement: multiDragElement,
            index: newIndex
          });
        });
        return {
          items: _toConsumableArray(multiDragElements),
          clones: [].concat(multiDragClones),
          oldIndicies: oldIndicies,
          newIndicies: newIndicies
        };
      },
      optionListeners: {
        multiDragKey: function multiDragKey(key) {
          key = key.toLowerCase();

          if (key === 'ctrl') {
            key = 'Control';
          } else if (key.length > 1) {
            key = key.charAt(0).toUpperCase() + key.substr(1);
          }

          return key;
        }
      }
    });
  }

  function insertMultiDragElements(clonesInserted, rootEl) {
    multiDragElements.forEach(function (multiDragElement, i) {
      var target = rootEl.children[multiDragElement.sortableIndex + (clonesInserted ? Number(i) : 0)];

      if (target) {
        rootEl.insertBefore(multiDragElement, target);
      } else {
        rootEl.appendChild(multiDragElement);
      }
    });
  }
  /**
   * Insert multi-drag clones
   * @param  {[Boolean]} elementsInserted  Whether the multi-drag elements are inserted
   * @param  {HTMLElement} rootEl
   */


  function insertMultiDragClones(elementsInserted, rootEl) {
    multiDragClones.forEach(function (clone, i) {
      var target = rootEl.children[clone.sortableIndex + (elementsInserted ? Number(i) : 0)];

      if (target) {
        rootEl.insertBefore(clone, target);
      } else {
        rootEl.appendChild(clone);
      }
    });
  }

  function removeMultiDragElements() {
    multiDragElements.forEach(function (multiDragElement) {
      if (multiDragElement === dragEl$1) return;
      multiDragElement.parentNode && multiDragElement.parentNode.removeChild(multiDragElement);
    });
  }

  Sortable.mount(new AutoScrollPlugin());
  Sortable.mount(Remove, Revert);

  Sortable.mount(new SwapPlugin());
  Sortable.mount(new MultiDragPlugin());

  return Sortable;

}));
var dfd_header_b = dfd_header_b || {};
dfd_header_b.View = [
];
dfd_header_b.View.Input = [
];
dfd_header_b.View.Setting = [
];
dfd_header_b.Model = [
];
dfd_header_b.Collection = [
];
dfd_header_b.APP = [
];
//dfd_header_b.Config = [
//];
dfd_header_b.HTMLEntity={};
/*
 * Defaault Preset for horizontal
 */

dfd_header_b.isInitColorPicker = false;
dfd_header_b.isInitSlider = false;
dfd_header_b.changeslider = true;
dfd_header_b.isFirstStart = true;
dfd_header_b.isnotifyEnable = true;
dfd_header_b.isClickedNewPreset = false;
dfd_header_b.sidePadding = 30;
dfd_header_b.Padding = 10;
dfd_header_b.isInit = false;
(function($) {
//	'use strict';
	$(document).on('ready', function() {
		initHeaderBuilder = function(){
			dfd_header_b.APP.appview = new dfd_header_b.View.AppView();
			dfd_header_b.APP.settingview = new dfd_header_b.View.SettingsView();
		};
		var header_builder_val = $("input[name='native[is_header_builder_enabled]']:checked").val();
		if($("#native-header_builder").is(":visible") && header_builder_val == "on"){
			initHeaderBuilder();
			dfd_header_b.isInit = true;
		}
		var main_btn_set = $("#native-is_header_builder_enabled").find(".dfd-options-two-buttons-set");
		main_btn_set.one("click", function(){
			setTimeout(function(){
				var header_builder_val = $("input[name='native[is_header_builder_enabled]']:checked").val();
				if(header_builder_val == "on"){
					initHeaderBuilder();
					dfd_header_b.isInit = true;
				}
			}, 200);
		});
		$(".redux-group-tab-link-li").on("click", function(){
			if(!dfd_header_b.isInit && header_builder_val == "on"){
				if($("#native-header_builder").is(":visible")){
					initHeaderBuilder();
					dfd_header_b.isInit = true;
				}
			}
		});
	});
})(jQuery);
var dfd_header_b = dfd_header_b || {};
dfd_header_b.HTMLEntity = {
	BuilderApp: {
		top: {
			left: "#dfd_header_t_preview .top .t_l1_left.left .wrapper",
			center: "#dfd_header_t_preview .top .t_l2_left.center .wrapper",
			right: "#dfd_header_t_preview .top .t_l3_left.right .wrapper"
		},
		middle: {
			left: "#dfd_header_t_preview .middle .t_l1_left.left .wrapper",
			center: "#dfd_header_t_preview .middle .t_l2_left.center .wrapper",
			right: "#dfd_header_t_preview .middle .t_l3_left.right .wrapper"
		},
		bottom: {
			left: "#dfd_header_t_preview .bottom .t_l1_left.left .wrapper",
			center: "#dfd_header_t_preview .bottom .t_l2_left.center .wrapper",
			right: "#dfd_header_t_preview .bottom .t_l3_left.right .wrapper"
		}
	},
	emulateDrag: {
		wrrap: ".t_wrap",
		wrrap_left: ".t_wrap .left",
		wrrap_right: ".t_wrap .right"
	},
	Sortable: {
		controls_block: "dfd_header_t_controls",
		preset_close: ".preset-window .close"
	},
	MainBlocks:{
		preview : "#dfd_header_t_preview",
		controls : "#dfd_header_t_controls"
	},
	start_drag_class : "start-drag",
	
	resetBtn:".button-view-switcher .dfd-options-button-cover",
	
	optionInput : "#header_builder_options"
};


dfd_header_b.APP.Builder = (function($) {
	var paste = [
	];
	position = {
		top: {
			left: "",
			center: "",
			right: ""
		},
		middle: {
			left: "",
			center: "",
			right: ""
		},
		bottom: {
			left: "",
			center: "",
			right: ""
		}
	};
	initPosition = function(){
		position = {
			top: {
				left: $(dfd_header_b.HTMLEntity.BuilderApp.top.left),
				center: $(dfd_header_b.HTMLEntity.BuilderApp.top.center),
				right: $(dfd_header_b.HTMLEntity.BuilderApp.top.right)
			},
			middle: {
				left: $(dfd_header_b.HTMLEntity.BuilderApp.middle.left),
				center: $(dfd_header_b.HTMLEntity.BuilderApp.middle.center),
				right: $(dfd_header_b.HTMLEntity.BuilderApp.middle.right)
			},
			bottom: {
				left: $(dfd_header_b.HTMLEntity.BuilderApp.bottom.left),
				center: $(dfd_header_b.HTMLEntity.BuilderApp.bottom.center),
				right: $(dfd_header_b.HTMLEntity.BuilderApp.bottom.right)
			}
		};
	};
	clearAll = function(){
		position.top.left.html("");
		position.top.center.html("");
		position.top.right.html("");

		position.middle.left.html("");
		position.middle.center.html("");
		position.middle.right.html("");

		position.bottom.left.html("");
		position.bottom.center.html("");
		position.bottom.right.html("");
	};
	/**
	 * 
	 * @param {dfd_header_b.APP.Sortable} sortable
	 * @returns array
	 */
	build = function(reinitSett){
		triggerReset();
		initPosition();
		clearAll();
		buildPreset(reinitSett);
		dfd_header_b.APP.collection.trigger("reInit");
	};
	buildPreset = function(reinitSett){
		var settings = dfd_header_b.Config.getCurrentSetting();
		var global_setting = dfd_header_b.Config.getGlobalSetting();

		if(settings != "") {
			dfd_header_b.Helper.normalizeLocalSetting();
			var settings = dfd_header_b.Config.getCurrentSetting();
			dfd_header_b.Config.setSettingByView(settings);
		} else {
			dfd_header_b.APP.settingCollection.trigger("reset");
			var new_sett = dfd_header_b.APP.settingCollection.toJSON();
			var new_global_sett = dfd_header_b.APP.globalSettingCollection.toJSON();

			dfd_header_b.Config.setSettingByView(new_sett);
			dfd_header_b.Config.setGlobalSetting(new_global_sett);
		}
		reinitSett = reinitSett == undefined ? true : false;
		if(reinitSett){
			dfd_header_b.View.Setting.init();
		} else {
			dfd_header_b.View.Setting.reInit();
		}

		var preset = dfd_header_b.Config.getCurrentPreset();

		for(var row in preset) {
			var row_el = preset[row];
			for(var col in row_el) {

				var col_el = row_el[col];
				for(var el  in col_el) {
//					row col
					if(_.isObject(col_el[el])){
						pasteObjToGrid(row, col, col_el[el]);
					}
				}
			}
		}

		this.addMarkerToCol();
		dfd_header_b.Helper.calculateOptimalLogoWidth();
		dfd_header_b.Dependency.init();
	};
	addMarkerToCol = function(){
		switcher = function(pos){
			if($(pos).children().length > 0){
				$(pos).addClass("hasEl");
			} else {
				$(pos).removeClass("hasEl");
			}
		};
		for(var key in this.position) {
			var pos = this.position[key];
			switcher(pos.left);
			switcher(pos.center);
			switcher(pos.right);
		}
	};
	pasteObjToGrid = function(row, col, obj){
		var type = obj.type;

		var row_el = "";
		var col_el = "";
		row = parseInt(row);
		col = parseInt(col);
		var canshow = dfd_header_b.View.Setting.canShow();

		switch (row) {
			case 0 :
				if(dfd_header_b.View.Setting.isShowTopPanel() || !canshow){
					row_el = "top";
				}
				break;
			case 1 :
				if(dfd_header_b.View.Setting.isShowMidPanel() || !canshow){
					row_el = "middle";
				}
				break;
			case 2 :
				if(dfd_header_b.View.Setting.isShowBotPanel() || !canshow){
					row_el = "bottom";
				}
				break;
		}
		switch (col) {
			case 0 :
				col_el = "left";
				break;
			case 1 :
				if(canshow){
					col_el = "center";
				}
				break;
			case 2 :
				if(canshow){
					col_el = "right";
				}
				break;
		}

		if(row_el != "" && col_el != "") {
			var models = dfd_header_b.APP.collection.where({type: type});
			if(models[0].get("type") == "delimiter" || models[0].get("type") == "spacer"){
				models[0] = models[0].clone();
			}
			var paste_el = models[0];
			var element = new dfd_header_b.View.ElementPrevView({model: paste_el});
			position[row_el][col_el].append(element.render().el);

			dfd_header_b.APP.collection_prev.add(paste_el);
			dfd_header_b.APP.collection.remove(paste_el);

		}
	};
	triggerReset = function(){
		dfd_header_b.APP.collection.reset();

		dfd_header_b.APP.collection_prev.reset();

		var preset = dfd_header_b.Helper.normalizeElementsCollection();

		dfd_header_b.APP.collection.reset(preset,
				{parse: true}
		);
		dfd_header_b.APP.settingCollection.reset(dfd_header_b.PreSetting, {parse: true});
	};
	addEllToPreview = function(){

	};
	return {
		build: build
	};
})(jQuery);

var dfd_header_b = dfd_header_b || {};
(function($){
	'use strict';

	dfd_header_b.View.Add_Preset = Backbone.View.extend({
		mainTemplate: '',
		el: ".add-preset-app",
		curentStyleHeader: "",
		hide: false,
		events: {

		},
		initialize: function(obj){
			if(typeof obj != "undefined"){
				this.hide = obj.hide;
			}
			this.hasError = false;
			this.ErrorMessage = "";
			this.mainTemplate = _.template($('#dfd_header_t_add_preset').html());
			this.listenTo(this, 'addError', this.addErrorMessage);
			this.listenTo(this, 'addEvents', _.debounce(this.ev, 0));
			this.curentStyleHeader = dfd_header_b.View.Setting.getHeaderStyle();
			this.trigger("addEvents");
		},
		ev: function(){
			var self = this;
			this.elem = this.$el.find("[type='submit']");
			this.elem.on("click", function(){
				self.save();
			});
			this.$el.find(".dfd-tiles").on("click", function(){
				var input = $(this).prev();
				self.$el.find("label.redux-image-select").removeClass("redux-image-select-selected");
				$(this).parent().addClass("redux-image-select-selected");
				self.curentStyleHeader = input.val();
				return false;
			});
		},
		addErrorMessage: function(){
			this.$(".error").html("");
			this.$(".error").show();
			this.$(".error").append(this.ErrorMessage);
		},
		save: function(e){
			var new_preset = this.newAttributes();
			if(_.isObject(new_preset)){
				var actives = dfd_header_b.APP.presets.where({isActive: "active"});
				for(var key in actives) {
					actives[key].set({isActive: ""});
				}
				dfd_header_b.APP.presets.add([
					new_preset
				]);
				new_preset.trigger("select");
				dfd_header_b.Helper.saveChanges();

				tb_remove();
				if(!dfd_header_b.Helper.presetWindowIsOpen){
					dfd_header_b.Helper.openPresetWindow();
				}
				this.elem.unbind("click");
			} else {
				this.trigger('addError');
			}
			return false;
		},
		newAttributes: function(){
			var DefaultPresetAndSettingsVal = dfd_header_b.Helper.getDefaultPresetAndSettingsVal(this.curentStyleHeader);
			var preset = DefaultPresetAndSettingsVal.preset;
			var settings = DefaultPresetAndSettingsVal.settings;
			if(dfd_header_b.isClickedNewPreset == true){
				dfd_header_b.Config.clearEditView();
				dfd_header_b.Config.clearSetting();


				dfd_header_b.Config.setSetting(settings);
			}

			var new_preset = new dfd_header_b.Model.Preset();
			var is_new = true;
			if(dfd_header_b.Config.editView.desktop.length == 0){
				is_new = false;
				dfd_header_b.Config.editView.desktop = preset.desktop;
			}
			if(dfd_header_b.Config.editView.tablet.length == 0){
				is_new = false;
				dfd_header_b.Config.editView.tablet = preset.tablet;
			}
			if(dfd_header_b.Config.editView.mobile.length == 0){
				is_new = false;
				dfd_header_b.Config.editView.mobile = preset.mobile;
			}

			new_preset.set({
				name: this.$input.val().trim(),
				isActive: "active",
				copyProc: "true",
				presetValues: {
					desktop: dfd_header_b.Config.editView.desktop,
					tablet: dfd_header_b.Config.editView.tablet,
					mobile: dfd_header_b.Config.editView.mobile,
				},
				settings: {
					desktop: dfd_header_b.Config.settings.desktop,
					tablet: dfd_header_b.Config.settings.tablet,
					mobile: dfd_header_b.Config.settings.mobile,
					globals: dfd_header_b.Config.globalSetting,
				}
			});

			if(new_preset.isValid()){
				return new_preset;
			} else {
				this.hasError = true;
				this.ErrorMessage = new_preset.validationError;
			}
			dfd_header_b.isClickedNewPreset == false;
			return new_preset.validationError;

		},
		render: function(){
			this.$el.html("");
			this.$el.append(this.mainTemplate({hide: this.hide}));
			if(!this.hide){
				var choose_preset_html = $("#native-style_header_builder");
				var preset_html = choose_preset_html.clone();
				this.$el.append(preset_html);
			}

			this.$input = this.$(".add_name");
			return this;
		}
	});
})(jQuery);
var dfd_header_b = dfd_header_b || {};
(function($){
	'use strict';

	dfd_header_b.View.Preset_View = Backbone.View.extend({
		mainTemplate: '',
		events: {
			"click": "selectPreset",
			"click .delete": "delete",
			"click .copy": "copyel",
			"click .rename": "rename",
			"click .change-name": "changeName",
			"click [type='submit']": "saveChanges",
		},
		initialize: function(){
			this.model.set("active", "");
			this.mainTemplate = _.template($('#dfd_header_t_preset_elem').html());

			this.model.on("invalid", function(model, error){
				alert( error);
			});
			this.listenTo(this.model, 'select', this.sel);
			this.listenTo(this.model, 'removeActive', this.removeActive);
			this.listenTo(this.model, 'change:name', this.viewNameChange);
		},
		sel: function(){
			this.selectPreset();
		},
		viewNameChange : function(obj){
			var name = this.model.get("name");
			this.$el.find(".name").html(name);
			dfd_header_b.Helper.saveChanges();
		},
		delete: function(){
			var isDelete = confirm("Preset will be deleted. Are  your sure?");
			if(!isDelete){
				return false;
			}
			var DefaultPresetAndSettingsVal = dfd_header_b.Helper.getDefaultPresetAndSettingsVal();
			var preset = DefaultPresetAndSettingsVal.preset;
			var settings = DefaultPresetAndSettingsVal.settings;
			var id = this.model.get("id");
			dfd_header_b.APP.presets.remove(id);
			this.$el.remove();
			dfd_header_b.Config.clearEditView();
			dfd_header_b.Config.clearSetting();
			dfd_header_b.Config.clearView();
			dfd_header_b.Helper.saveChanges();
			dfd_header_b.Config.setPreset(preset);
			dfd_header_b.Config.setSetting(settings);
			dfd_header_b.Helper.addLoader();
			setTimeout(function(){
				dfd_header_b.APP.Builder.build();
			}, 100);
		},
		changeName: function(){
			var val = this.$el.find("input[name='edit_name']").val();
			this.model.set({
				name: val
			},{validate:true});
		},
		rename: function(){
			this.$el.find(".rename_preset").toggleClass("show");
		},
		copyel: function(){

			var id = this.model.get("id");
			var $this = this;

			var name = this.model.get("name") + " Copy";
			var overlayContent = this.model.get("overlayContent");

			this.model.set({isActive: ""});

			var obj = new dfd_header_b.Model.Preset();
			obj.set({
				id: obj.cid,
				isActive: "active",
				name: name,
				copyProc: "true",
				isDefault: false,
				presetValues: this.model.get("presetValues"),
				settings: this.model.get("settings"),
				overlayContent: overlayContent,
			});


			this.model.trigger("removeActive");



			dfd_header_b.Config.clearEditView();
			dfd_header_b.Config.clearSetting();
			dfd_header_b.APP.presets.add([
				obj
			]);

			var preset = obj.get("presetValues");
			var setttings = obj.get("settings");

			dfd_header_b.Config.setPreset(preset);

			dfd_header_b.Config.setSetting(setttings);

			dfd_header_b.Helper.saveChanges();
			setTimeout(function(){
				dfd_header_b.APP.Builder.build();
			}, 100);
		},
		saveChanges: function(){
		},
		selectPreset: function(force){
			if(this.$el.hasClass("active")){
				return false;
			}
			var active = this.model.get("isActive");
			if(active == "active" && _.isObject(force)){
				return false;
			}
			var actives = dfd_header_b.APP.presets.where({isActive: "active"});
			for(var key in actives) {
				actives[key].set({isActive: ""});
			}
			var name = this.model.get('name')
			dfd_header_b.Config.curentPreset = name;
			
			this.model.set({isActive: "active"});
			
			this.model.trigger("removeActive");
			$(this.$el).toggleClass("active");
			dfd_header_b.Config.clearEditView();
			dfd_header_b.Config.clearSetting();


			var preset = this.model.get("presetValues");
			var setttings = this.model.get("settings");

			dfd_header_b.Config.setPreset(preset);

			dfd_header_b.Config.setSetting(setttings);

			dfd_header_b.Helper.addLoader();
			dfd_header_b.changeslider = true;
			setTimeout(function(){
				dfd_header_b.isnotifyEnable = false;
				dfd_header_b.APP.Builder.build();
				dfd_header_b.Helper.saveChanges(false);
			}, 100);
			dfd_header_b.isnotifyEnable = true;
			dfd_header_b.Helper.checkSetOnDefault();

		},
		className: function(){
			return "preset";
		},
		removeActive: function(){
			$(this.$el).siblings().removeClass("active");
		},
		render: function(){

			this.$el.append(this.mainTemplate(this.model.toJSON()));
			return this;
		}
	});
})(jQuery);
var dfd_header_b = dfd_header_b || {};
(function($){
	'use strict';
	dfd_header_b.View.Presets_View = Backbone.View.extend({
		el: '.preset-window .list',
		mainTemplate: '',
		events: {
		},
		initialize: function(){

			this.listenTo(dfd_header_b.APP.presets, 'add', _.debounce(this.add, 0));
			this.listenTo(dfd_header_b.APP.presets, 'all', _.debounce(this.render, 0));
			this.listenTo(dfd_header_b.APP.presets, 'reset', _.debounce(this.reset, 0));
			this.listenTo(dfd_header_b.APP.presets, 'change', this.change);
			this.listenTo(dfd_header_b.APP.presets, 'triggerActive', this.triggerActive);


			var value = $(dfd_header_b.HTMLEntity.optionInput).val();
			var parsedVal = [
			];
			if(dfd_header_b_DefaultPresets){
				for(var def_preset in dfd_header_b_DefaultPresets) {
					parsedVal.push(dfd_header_b_DefaultPresets[def_preset]);
				}
			}

			if(value.trim() != ""){
				var presets = JSON.parse(value);
				for(var key in presets) {
					parsedVal.push(presets[key]);
				}
			}
			dfd_header_b.APP.presets.reset(parsedVal, {parse: true});
		},
		sel: function(m){

		},
		add: function(model){
			var preset = new dfd_header_b.View.Preset_View({model: model});
			this.$el.append(preset.render().el);
			if(model.get("isActive") == "active"){
				model.trigger("select");
			}
		},

		triggerActive: function(model){
			this.filterOne(model);
		},
		filterOne: function(model){
			return false;
			var name = model.get('name')
			var isCopy = model.get('copyProc')
			if(model.get("isActive") == "active"){
				dfd_header_b.Config.curentPreset = name;
			}
			var AllActivePresets = dfd_header_b.APP.presets.filter(function(preset){
				return  preset.get("name") != name;
			});
			if(AllActivePresets.length){
				for(var preset in AllActivePresets) {
					AllActivePresets[preset].set({isActive: ""},
					{silent: true}
					);
				}
			}
		},
		change: function(model){
			this.filterOne(model);

		},
		reset: function(collect, prev){
			this.$el.html("");
			dfd_header_b.APP.presets.each(this.add, this);
		},
		render: function(){
			return this;
		}
	});


})(jQuery);
var dfd_header_b = dfd_header_b || {};

dfd_header_b.APP.Sortable = (function($){
	controls = {
		left: [
		],
		right: [
		],
		center: [
		]
	};
	var has_created = false;
	var row = 3, col = 3;
	var $this = this;
	var controls_container_name = dfd_header_b.HTMLEntity.Sortable.controls_block;

	emulateDrag = function(){
		$(dfd_header_b.HTMLEntity.emulateDrag.wrrap).addClass("start");
		$(dfd_header_b.HTMLEntity.emulateDrag.wrrap_left).addClass("start");
		$(dfd_header_b.HTMLEntity.emulateDrag.wrrap_right).addClass("start");
	};
	/**
	 * 
	 * @returns {Array}
	 */
	getValuesFormAllCells = function(){
		var mass = [
			[
				0,
				0,
				0
			],
			[
				0,
				0,
				0
			],
			[
				0,
				0,
				0
			]
		];
		for(var i = 0; i < row; i++) {
			for(j = 0; j < col; j++) {
				switch (j) {
					case 0 :
						if(controls.left[i]){
							mass[i][j] = getModelsByIds(controls.left[i].toArray());
						}
						break;
					case 1 :
						if(controls.center[i]){
							mass[i][j] = getModelsByIds(controls.center[i].toArray());
						}
						break;
					case 2 :
						if(controls.right[i]){
							mass[i][j] = getModelsByIds(controls.right[i].toArray());
						}
						break;
				}
			}
		}
		return mass;
	};
	emulateParse = function(){
		var mass = getValuesFormAllCells();
		var strin = JSON.stringify(mass, [
			"id",
			"name",
			"type",
			"isfullwidth"
		], 4);
		$(".debug").show();
		$(".debug.left").html(strin);
	};
	_copyPresetCode = function(){
		var active_preset = dfd_header_b.APP.presets.findWhere({isActive: "active"});
		var settings = active_preset.get("settings");
		dfd_header_b.Helper.removeNullEl(settings, "desktop");
		dfd_header_b.Helper.removeNullEl(settings, "tablet");
		dfd_header_b.Helper.removeNullEl(settings, "mobile");
		dfd_header_b.Helper.removeNullEl(settings, "globals");
		active_preset.set({settings: settings});
		var code = JSON.stringify(active_preset);
	};
	_debug = function(){
		var mass = dfd_header_b.APP.collection.toArray();
		var mass2 = dfd_header_b.APP.collection_prev.toArray();
		var strin = JSON.stringify(mass, [
			"id",
			"type",
			"isfullwidth"
//			"temp"
		], 4);
		var strin2 = JSON.stringify(mass2, [
			"id",
			"type",
			"isfullwidth"
//			"temp"
		], 4);
		$(".debug").show();
		$(".debug.right").html(strin2 + "<br>--------<br>");
		$(".debug.right").append(strin);
	};
	events = function(){
		
		$(dfd_header_b.HTMLEntity.MainBlocks.preview).on("mouseover", ".c_el", function(){
			return false;
		});
		$(dfd_header_b.HTMLEntity.MainBlocks.preview).on("mouseleave", ".container", function(){
			var cont = $(this).removeClass("hover-element");
			return false;
		});
		$(dfd_header_b.HTMLEntity.MainBlocks.preview).on("mouseleave", ".c_el", function(){
			var cont = $(this).parents(".container").removeClass("hover-element");
			return false;
		});
		$(dfd_header_b.HTMLEntity.Sortable.preset_close).on("click", function(){
			var sidebar = $(this).parent();
			sidebar.parent().removeClass("preset-open");
		});
	};
	/**
	 * 
	 * @param {Array} model_id
	 * @returns {dfd_header_b.Collection.Elements}
	 */
	getModelsByIds = function(model_id){
		var models = _.map(model_id, function(num){
			var model = dfd_header_b.APP.collection.get(num);
			if(_.isObject(model)){
				return model;
			} else {
				return dfd_header_b.APP.collection_prev.get(num);
			}
		});
		return models;
	};

	init = function() {
		$(".c_el").on("touch touchmove", function(){
			$("body").disablescroll();
		});

		var controls_id = $("#" + controls_container_name)[0];
		if(has_created){
			return false;
		}
		events();

		createSort(controls_id, 'controls', [
			'controls',
			'preview_left',
			'preview_center',
			'preview_right'
		]);

		var preview_left = $(".t_wrap .t_l1_left .wrapper");
		var preview_center = $(".t_wrap .t_l2_left .wrapper");
		var preview_right = $(".t_wrap .t_l3_left .wrapper");
		preview_left.each(function(){
			controls.left.push(createSort(this, 'preview_left', [
				'controls',
				'preview_left',
				'preview_center',
				'preview_right'
			]));
		});
		preview_center.each(function(){
			controls.center.push(createSort(this, 'preview_center', [
				'controls',
				'preview_left',
				'preview_center',
				'preview_right'
			]));

		});
		preview_right.each(function(){
			controls.right.push(createSort(this, 'preview_right', [
				'controls',
				'preview_left',
				'preview_center',
				'preview_right'
			]));
		});
		has_created = true;
	};
	EventObject = {
		item: "",
		from: "",
		to: "",
		from_id: "",
		to_id: "",
		model_id: "",
		direction_from: "",
		direction_to: "",
		clear: function(){
			this.item = "";
			this.from = "";
			this.to = "";
			this.from_id = "";
			this.to_id = "";
			this.model_id = "";
			this.direction_from = "";
			this.direction_to = "";
		},
		/**
		 * Posible values: prevToprev,prevTocontrols, controlsToprev, controlsTocontrols,
		 * @returns {String}
		 */
		getDirection: function(){
			return this.direction_from + "To" + this.direction_to;
		},
		setDirection: function(){
			var from = $(this.from).hasClass("wrapper");
			if(from){
				this.direction_from = "prev";
			} else {
				this.direction_from = "controls";
			}
			var to = $(this.to).hasClass("wrapper");
			if(to){
				this.direction_to = "prev";
			} else {
				this.direction_to = "controls";
			}
		}
	}
	prepareObject = function(evt){
		EventObject.clear();
		EventObject.item = evt.item;
		EventObject.from = evt.from;
		EventObject.to = evt.to;
		EventObject.from_id = $(EventObject.from).attr("id");
		EventObject.to_id = $(EventObject.to).attr("id");
		EventObject.model_id = $(EventObject.item).attr("id");
		EventObject.setDirection();
	};
	addElement = function(evt){
		prepareObject(evt);
		var direction = EventObject.getDirection();
		var model = dfd_header_b.APP.collection.get(EventObject.model_id);
		var model_prev = dfd_header_b.APP.collection_prev.get(EventObject.model_id);

		if(_.isObject(model)){
			var onlim = model.get("onlimit");
			if(onlim == false){
				dfd_header_b.APP.collection_prev.add(model);
				dfd_header_b.APP.collection.remove(model);
			}
		}
		if(_.isObject(model_prev)){
			var onlim = model_prev.get("onlimit");
			if(onlim == false){
				if(direction != "prevToprev"){
					dfd_header_b.APP.collection.add(model_prev);
					dfd_header_b.APP.collection_prev.remove(model_prev);
				}
			}
		}
	};
	addOnLimitElements = function(evt){
		prepareObject(evt);

		var model = dfd_header_b.APP.collection.get(EventObject.model_id);
		var model_prev = dfd_header_b.APP.collection_prev.get(EventObject.model_id);

		var onlim = false;
		if(_.isObject(model)){
			onlim = model.get("onlimit");
			var type = model.get("type");
			if(onlim == true && EventObject.from_id == controls_container_name){
				var new_model = model.clone();
				new_model.set("id", "");
				var count = dfd_header_b.APP.collection.where({type: type});
				if(count.length <= 1){
					dfd_header_b.APP.collection.add(new_model);
				}
				dfd_header_b.APP.collection.remove(model);
				dfd_header_b.APP.collection_prev.add(model);

			}
		}
		if(_.isObject(model_prev)){
			onlim = model_prev.get("onlimit");
			if(onlim == true && EventObject.to_id == controls_container_name){
				dfd_header_b.APP.collection_prev.remove(model_prev);
				dfd_header_b.APP.collection.add(model_prev);
			}
		}
		dfd_header_b.Helper.saveChanges();
		setTimeout(function(){
			dfd_header_b.APP.Builder.build();
		}, 50);

	};

	createSort = function(obj, name, put, $this){
		return Sortable.create(obj, {
			group: {
				name: name,
				put: put
			},
			onStart: function(evt){

				$(dfd_header_b.HTMLEntity.emulateDrag.wrrap).addClass("start");
				$(dfd_header_b.HTMLEntity.emulateDrag.wrrap_left).addClass("start");
				$(dfd_header_b.HTMLEntity.emulateDrag.wrrap_right).addClass("start");
				dfd_header_b.Helper.claerTransformMiddleBlock();
				dfd_header_b.Helper.RoundContentTransform();
				evt.oldIndex;  // element index within parent
			},
			onMove: function(/**Event*/evt){
				var is_logo = $(evt.dragged).hasClass("Logo");
				if(is_logo){
					dfd_header_b.Helper.calculateOptimalLogoWidth();
				}
			},
			onAdd: function(evt){
				addOnLimitElements(evt);
				addElement(evt);

				var preset_name = dfd_header_b.Config.getCurentPresetName();
				if(preset_name == ""){
					dfd_header_b.Helper.addPresetWindow({hide: true});
					dfd_header_b.isClickedNewPreset = false;
				}
			},
			onEnd: function(evt){

				$(dfd_header_b.HTMLEntity.emulateDrag.wrrap).removeClass("start");
				$(dfd_header_b.HTMLEntity.emulateDrag.wrrap_left).removeClass("start");
				$(dfd_header_b.HTMLEntity.emulateDrag.wrrap_right).removeClass("start");
				$(evt.item).removeClass(dfd_header_b.HTMLEntity.start_drag_class);

				dfd_header_b.Helper.calculateOptimalLogoWidth();
				dfd_header_b.Helper.claerTransformMiddleBlock();
				dfd_header_b.Helper.RoundContentTransform();
				dfd_header_b.Helper.saveChanges();
				$("body").disablescroll("undo");
			},
			//			// Element is chosen
//			onChoose: function(/**Event*/evt){
//			},
//			// Attempt to drag a filtered element
			scroll: false,
			filter: '.hover-controls',
			onFilter: function(evt){
			},
			setData: function(/** DataTransfer */dataTransfer, /** HTMLElement*/dragEl){
				$(dragEl).addClass(dfd_header_b.HTMLEntity.start_drag_class);
				dataTransfer.setData('Text', dragEl.textContent); // `dataTransfer` object of HTML5 DragEvent
			},
			animation: 100,
		});
	};
	return  {
		init: init,
		controls: controls,
		getValuesFormAllCells: getValuesFormAllCells
	};
})(jQuery);


/*global Backbone */
var dfd_header_b = dfd_header_b || {};

(function($, window){
	'use strict';
	dfd_header_b.Helper = {
		presetWindowIsOpen: false,
		addPresetWindow: function(obj){
			tb_show("Add new preset", '#TB_inline?width=750&height=600&inlineId=examplePopup1');
			$("#TB_window").addClass("add-preset");
			var new_preset = new dfd_header_b.View.Add_Preset(obj);
			new_preset.render();
		},
		getFileExtension: function(filename)
		{
			var ext = /^.+\.([^.]+)$/.exec(filename);
			return ext == null ? "" : ext[1];
		},
		getBigImgFromthumb: function(image_thumb){
			var big_img = image_thumb.match(/(.*)-[\d]{1,5}x/);

			if(big_img){
				var ext = this.getFileExtension(image_thumb);
				big_img = big_img[1] + "." + ext;
			} else {
				big_img = image_thumb;
			}
			return  big_img;
		},
		classSwitcher: function(value, posible_values, target, prefix){
			function removeClasses(){
				for(var i = 0; i < posible_values.length; i++) {
					var curVal = prefix + "_" + posible_values[i];
					target.removeClass(curVal);
				}
			}
			for(var i = 0; i < posible_values.length; i++) {
				var curVal = posible_values[i];
				if(value == curVal){
					var addclass = prefix + "_" + value;
					removeClasses();
					target.addClass(addclass);
				}
			}
		},
		roundCssTransformMatrix: function(el){

			var mx = window.getComputedStyle(el, null);
			mx = mx.getPropertyValue("-webkit-transform") ||
					mx.getPropertyValue("-moz-transform") ||
					mx.getPropertyValue("-ms-transform") ||
					mx.getPropertyValue("-o-transform") ||
					mx.getPropertyValue("transform") || false;
			var values = mx.replace(/ |\(|\)|matrix/g, "").split(",");
			for(var v in values) {
				values[v] = v > 4 ? Math.ceil(values[v]) : values[v];
			}
			return values;


		},
		claerTransformMiddleBlock: function(){
			$("#container_middle_builder").css("transform", "");
		},
		RoundContentTransform: function(){

			var el_p = $("#container_middle_builder");
			var $this = this;
			setTimeout(function(){
				if($this.CanUseOptionInSideHeader()){
					var el = document.getElementById("container_middle_builder");
					var values = $this.roundCssTransformMatrix(el);
					el_p.css({transform: "matrix(" + values.join() + ")"});
				} else {
					el_p.css({transform: ""});
				}
			}, 100);
		},
		setDelimiterWidth: function(){
			var delim_model = dfd_header_b.APP.globalSettingCollection.findWhere({"id": "header_side_bar_width_builder"});
			var delim_width = delim_model.get("value");
			var delim_model_color = dfd_header_b.APP.globalSettingCollection.findWhere({"id": "header_border_color_build"});
			if(!_.isObject(delim_model_color)){
				var delim_model_color = dfd_header_b.APP.settingCollection.findWhere({"id": "header_border_color_build"});
			}
			var delim_color_raw = delim_model_color.get("value");
			var delim_color = JSON.parse(delim_color_raw);
			var width_main = delim_width - dfd_header_b.sidePadding * 2;
			var css = '.header_builder_app #dfd_header_t_preview.side-header .Delimiter{ width : ' + width_main + 'px !important;} ';
			css += ' .header_builder_app #dfd_header_t_preview.side-header .Delimiter:after{width : ' + delim_width + 'px !important;}';
			$("#header_builder_style").html("");
			$("#header_builder_style").append(css);
		},
		getColor: function(id, islocal){
			var color_obj;
			if(islocal){
				color_obj = dfd_header_b.APP.settingCollection.findWhere({"id": id});
			} else {
				color_obj = dfd_header_b.APP.globalSettingCollection.findWhere({"id": id});
			}
			var row_val = color_obj.get("value");
			var values_obj = JSON.parse(row_val);
			var color = "";
			if(values_obj.is_transparent == "true"){
				color = "transparent";
			} else {
				if(values_obj.color == ""){
					color = color_obj.get("def");
					if(color == ""){
						for(var k in dfd_header_b.PreSetting) {
							var obj = dfd_header_b.PreSetting[k];
							if(obj.id == setting.id){
								color = obj.def;
								break;
							}
						}
					}
				} else {
					color = values_obj.color;

				}
			}
			return color;
		},
		SetColor: function(){
//			if(dfd_header_b.isInitColorPicker == true){
//				return false;
//			}
			var header_top_background_color_build = this.getColor("header_top_background_color_build", true);
			var header_mid_background_color_build = this.getColor("header_mid_background_color_build", true);
			var header_bot_background_color_build = this.getColor("header_bot_background_color_build", true);
			var header_border_color_build = this.getColor("header_border_color_build", true);
			var header_top_text_color_build = this.getColor("header_top_text_color_build", true);
			var header_mid_text_color_build = this.getColor("header_mid_text_color_build", true);
			var header_bot_text_color_build = this.getColor("header_bot_text_color_build", true);
			var header_side_background_color_builder = this.getColor("header_side_background_color_builder");
			var css = '#dfd_header_t_preview:not(.side-header) .top{background:' + header_top_background_color_build + ';border-color:' + header_border_color_build + ';}' +
					'#dfd_header_t_preview .top{color:' + header_top_text_color_build + ';}' +
					'#dfd_header_t_preview:not(.side-header) .middle{background:' + header_mid_background_color_build + ';border-color:' + header_border_color_build + ';}' +
					'#dfd_header_t_preview .middle{color:' + header_mid_text_color_build + ';}' +
					'#dfd_header_t_preview:not(.side-header) .bottom{background:' + header_bot_background_color_build + ';border-color:' + header_border_color_build + ';}' +
					'#dfd_header_t_preview .bottom{color:' + header_bot_text_color_build + ';}' +
					'#dfd_header_t_preview .top .top-inner-page > span > span{background:' + header_top_text_color_build + ';}' +
					'#dfd_header_t_preview .middle .top-inner-page > span > span {background:' + header_mid_text_color_build + ';}' +
					'#dfd_header_t_preview .bottom .top-inner-page > span > span{background:' + header_bot_text_color_build + ';}' +
					'#dfd_header_t_preview .top .dl-menuwrapper .icon-wrap{background:' + header_top_text_color_build + ';}' +
					'#dfd_header_t_preview .middle .dl-menuwrapper .icon-wrap{background:' + header_mid_text_color_build + ';}' +
					'#dfd_header_t_preview .bottom .dl-menuwrapper .icon-wrap{background:' + header_bot_text_color_build + ';}' +
					'.header_builder_app .header_builder_wrapper #dfd_header_t_preview .container{border-color:' + header_border_color_build + ';}' +
					'#dfd_header_t_preview .dfd-header-delimiter{border-color:' + header_border_color_build + ';}' +
					'#dfd_header_t_preview .Delimiter{border-color:' + header_border_color_build + ';}' +
					'.header_builder_app #dfd_header_t_preview.side-header .dfd_header_t_preview_wrapper{background-color:' + header_side_background_color_builder + ';}';
			var telephone_width = this.getWidthEl("header_telephone_builder");
			var copy_right_width = this.getWidthEl("header_copyright_builder");
			var top_info_width = this.getTopInfoWidth();
			var wishlist_width = this.getWishListWidth();
			var login_width = this.getLoginWidth();
			css += "#dfd_header_t_preview .Telephone.c_el{min-width:" + telephone_width + "px;}";
			css += "#dfd_header_t_preview .Copyright-message.c_el{min-width:" + copy_right_width + "px;}";
			css += "#dfd_header_t_preview .Info.c_el{min-width:" + top_info_width + "px;}";
			css += "#dfd_header_t_preview .Wishlist.c_el{min-width:" + wishlist_width + "px;}";
			css += "#dfd_header_t_preview .Login.c_el{min-width:" + login_width + "px;}";
			$("#header_builder_colors").html("");
			$("#header_builder_colors").append(css);

		},
		getWidthEl: function(name){
			var obj = dfd_header_b.APP.globalSettingCollection.findWhere({id: name});
			if(_.isObject(obj)){
				var obj_val = obj.get("value");
				var calc_with = $(".calculate_width");
				calc_with.html(obj_val);
				var obj_width = calc_with.width() + dfd_header_b.Padding * 2 + 1;
				if(dfd_header_b.Helper.CanUseOptionInSideHeader()){
					obj_width = obj_width + dfd_header_b.sidePadding * 2;
					var side_width_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: "header_side_bar_width_builder"});
					var side_width = side_width_model.get("value");
					if(side_width < obj_width){
						obj_width = side_width - dfd_header_b.sidePadding * 2;
					}
					else {
						obj_width = obj_width - dfd_header_b.sidePadding * 2;
					}
				}
				calc_with.html("");
				return obj_width;
			}
			return "";
		},
		getTopInfoWidth: function(){
			var calc_with = $(".calculate_top_info_width");
			calc_with.show();
			var width = calc_with.width() + dfd_header_b.Padding * 2 + 1;
			if(dfd_header_b.Helper.CanUseOptionInSideHeader()){
				width = width + dfd_header_b.sidePadding * 2;
				var side_width_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: "header_side_bar_width_builder"});
				var side_width = side_width_model.get("value");
				if(side_width < width){
					width = side_width - dfd_header_b.sidePadding * 2;
				}
				else {
					width = width - dfd_header_b.sidePadding * 2;
				}
			}
			calc_with.hide();
			return width;
		},
		getWishListWidth: function(){
			var calc_with = $(".calulate_wishlist_width");
			calc_with.show();
			var width = calc_with.width() + dfd_header_b.Padding * 2 + 1;
			calc_with.hide();
			if(width > 55){
				return width;
			}
			return "";
		},
		getLoginWidth: function(){
			var calc_with = $(".calulate_login_width");
			calc_with.show();
			var width = calc_with.width() + dfd_header_b.Padding * 2 + 1;
			calc_with.hide();
			return width;
		},
		CanUseOptionInSideHeader: function(){
			var style = dfd_header_b.View.Setting.getHeaderStyle();
			var cur_view = dfd_header_b.Config.getCurentView();
			if(style == "side" && cur_view == "desktop"){
				return true;
			}
			return false;
		},
		deleteByView: function(settings, view, remove_global){
			var desktop_settiings = settings[view];
			for(var set_key in desktop_settiings) {
				var sett_obj = desktop_settiings[set_key];
				if(_.isObject(sett_obj)){
					if(sett_obj.isGlobal == remove_global){
						delete desktop_settiings[set_key];
					}
				}
			}
			this.removeNullEl(settings, view);
		},
		removeNullEl: function(settings, view){
			var desktop_settiings = settings[view];
			for(var i = desktop_settiings.length - 1; i >= 0; i--) {
				if(desktop_settiings[i] == null){
					desktop_settiings.splice(i, 1);
				}
			}
			return desktop_settiings;
		},
		getDefaultPresetAndSettingsVal: function(style){
			if(typeof style == "undefined"){
				style = dfd_header_b.View.Setting.getHeaderStyle();
			}
			var preset, settings;
			switch (style) {
				case "horizontal" :
					preset = dfd_header_b.Default.presetValues;
					settings = dfd_header_b.Default.settings;
					break;
				case "side" :
					preset = dfd_header_b.DefaultPresetSide.presetValues;
					settings = dfd_header_b.DefaultPresetSide.settings;
					break;
				case "boxed" :
					preset = dfd_header_b.DefaultPresetBoxed.presetValues;
					settings = dfd_header_b.DefaultPresetBoxed.settings;
					break;
				default :
					preset = dfd_header_b.Default.presetValues;
					settings = dfd_header_b.Default.settings;
			}
			return {
				"preset": preset,
				"settings": settings,
			};
		},
		stringifyValus: function(){

//				
			dfd_header_b.Config.setPresetState();

			var presstsToSave = dfd_header_b.APP.presets.where({isDefault: false});
			for(var key in presstsToSave) {
				var preset = presstsToSave[key];
				var settings = preset.get("settings");
				this.deleteByView(settings, "desktop", "true");
				this.deleteByView(settings, "tablet", "true");
				this.deleteByView(settings, "mobile", "true");
				this.deleteByView(settings, "globals", "false");
			}
			presstsToSave = JSON.stringify(presstsToSave, [
				"name",
				"isActive",
				"presetValues",
				"type",
				"desktop",
				"mobile",
				"tablet",
				"settings",
				"id",
				"value",
				"def",
				"globals",
				"isGlobal",
				"color",
				"isfullwidth",
				"is_transparent",
				"overlayContent",
			]);
			return presstsToSave;
		},
		openPresetWindow: function(){
			var sidebar = $(".preset-window");
			var parent = sidebar.parent();

			parent.toggleClass("preset-open");
			if(parent.hasClass("preset-open")){
				this.presetWindowIsOpen = true;
			} else {
				this.presetWindowIsOpen = false;
			}
			return false;
		},
		calculateOptimalLogoWidth: function(){
			var horizView = function(){
				var logoobj = $("#dfd_header_t_preview .c_el.port.Logo");
				var img = logoobj.find("img");
				var parent = logoobj.parent();
				img = img[0];
				if(typeof img == "undefined"){
					return false;
				}
				var naturalHeight = img.naturalHeight;
				var naturalWidth = img.naturalWidth;
				if((typeof naturalHeight == "undefined") && (typeof naturalWidth == "undefined")){
					return false;
				}
				var kx = naturalWidth / naturalHeight;
				var row_height = parent.height();

				var new_width = row_height * kx;
				if(row_height > naturalHeight){
					new_width = naturalWidth;
				}
				new_width += dfd_header_b.Padding * 2;
				new_width = new_width - 1;
				if(dfd_header_b.Config.getCurentView() != "mobile"){
					logoobj.addClass("init").css({
						"width": new_width,
						"max-width": new_width,
						"min-width": new_width,
					});
				} else {
					logoobj.addClass("init").removeAttr("style");
				}

			};
			setTimeout(function(){
				if(!dfd_header_b.Helper.CanUseOptionInSideHeader()){
					horizView();
				}

			}, 200);
		},
		addLoader: function(){
			$(".header_builder_app ").addClass("init");
		},
		removeLoader: function(){
			$(".header_builder_app ").removeClass("init");
		},
		hideSetting: function(){
			var el = $("#info-grid_info_setting_builder");
			el.hide();
			el.next().hide();
		},
		showSetting: function(){
			var el = $("#info-grid_info_setting_builder");
			el.show();
			el.next().show();
		},
		isDefaultCurentPreset: function(){
			var preset = dfd_header_b.APP.presets.findWhere({"isActive": "active"});
			if(_.isObject(preset)){
				var isdefault = preset.get("isDefault");
				if(isdefault){
					return true;
				} else {
					return false;
				}
			}
			return false;
		},
		checkSetOnDefault: function(){
			var isdefault = this.isDefaultCurentPreset();
			if(isdefault){
				dfd_header_b.Helper.hideSetting();
				return false;
			}
			dfd_header_b.Helper.showSetting();
		},
		saveChanges: function(check){
			var curentPreset = dfd_header_b.APP.presets.findWhere({isActive: "active"});

			if(_.isObject(curentPreset)){
				var is_def = curentPreset.get("isDefault");
				if(is_def == true){
					if(check == true || check == null){
						alert("This is default preset. You can't edit this only copy enable");
					}
					return false;
				}
			}

			var el = [
			];
			if(dfd_header_b.Config.isnew == false){
				var mass = dfd_header_b.APP.Sortable.getValuesFormAllCells();
				var strin = JSON.stringify(mass, [
					"name",
					"type",
					"isfullwidth"
				]);
				el = JSON.parse(strin);
				dfd_header_b.Config.setPresetByView(el);
			}
			dfd_header_b.APP.presets.trigger("addToOption");
			dfd_header_b.Config.isnew = false;
		},
		normalizeGlobalSetting: function(){
			var glob_set = dfd_header_b.Config.getGlobalSetting();
			var global_collection = dfd_header_b.APP.globalSettingCollection.toJSON();
			if(glob_set.length != global_collection.length){
				for(var set in global_collection) {
					var obj = global_collection[set];
					var found = false;
					for(var glob_set_key in glob_set) {
						var glob_obj = glob_set[glob_set_key];
						if(obj.id == glob_obj.id){
							found = true;
							var paste_obj_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: obj.id});
							paste_obj_model.set(glob_obj);
							continue;
						}
					}
					if(!found){
						var paste_obj_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: obj.id});
						for(var presetKey in dfd_header_b.PreSetting) {
							var preset_obj = dfd_header_b.PreSetting[presetKey];
							if(preset_obj.id == obj.id){
								paste_obj_model.set(preset_obj);
							}
						}
					}
				}
				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
			} else {
				dfd_header_b.APP.globalSettingCollection.reset(glob_set);
				dfd_header_b.Config.setGlobalSetting(glob_set);
			}
		},
		normalizeLocalSetting: function(){
			var glob_set = dfd_header_b.Config.getCurrentSetting();
			var setting_collection = dfd_header_b.APP.settingCollection.toJSON();
			if(glob_set.length != setting_collection.length){

				for(var set in setting_collection) {
					var obj = setting_collection[set];
					var found = false;
					for(var glob_set_key in glob_set) {
						var glob_obj = glob_set[glob_set_key];
						if(obj.id == glob_obj.id){
							found = true;

							var paste_obj_model = dfd_header_b.APP.settingCollection.findWhere({id: obj.id});
							paste_obj_model.set(glob_obj);
							continue;
						}
					}
					if(!found){
						var paste_obj_model = dfd_header_b.APP.settingCollection.findWhere({id: obj.id});
						for(var presetKey in dfd_header_b.PreSetting) {
							var preset_obj = dfd_header_b.PreSetting[presetKey];
							if(preset_obj.id == obj.id){
								paste_obj_model.set(preset_obj);
							}
						}
					}
				}
				var setting_collection = dfd_header_b.APP.settingCollection.toJSON();
				dfd_header_b.Config.setSettingByView(setting_collection);
			} else {
				dfd_header_b.APP.settingCollection.reset(glob_set, {silent: true});
				dfd_header_b.Config.setSettingByView(glob_set);
			}
		},
		normalizeElementsCollection: function(){
			var preset = dfd_header_b.Config.getCurrentPreset();
			var premade_preset = dfd_header_b.PremadeElements.el;

			var coll = [
			];
			for(var preset_key in preset) {
				var row = preset[preset_key];
				for(var row_key in row) {
					var col = row[row_key];
					if(col.length > 0){
						for(var col_key in col) {
							var obj = col[col_key];
							if(_.isObject(obj)){
								if(obj.type != "delimiter" && obj.type != "spacer"){
									coll.push(obj);
								}
							}

						}
					}
				}
			}
			if(coll.length != premade_preset.length){
				for(var premade_elem_key in premade_preset) {
					var premade_preset_obj = premade_preset[premade_elem_key];
					var found = false;
					for(var coll_key in coll) {
						var coll_obj = coll[coll_key];
						if(_.isObject(obj)){
							if(coll_obj.type == premade_preset_obj.type){
								found = true;
								continue;
							}
						}
					}
					if(!found){
						coll.push(premade_preset_obj);
					}
				}
			}
			return coll;
		}
	};
})(jQuery, window);

/*global Backbone */
var dfd_header_b = dfd_header_b || {};

(function($, window){
	'use strict';

	dfd_header_b.Model.Element = Backbone.Model.extend({
		defaults: {
//			id: '',
			name: '',
			type: '',
			class_el: '',
			onlimit: false,
			image: '',
			isfullwidth: false
		},
		initialize: function(models, options){
			if(this.get("class_el") == ""){
				var premade_preset = dfd_header_b.PremadeElements.el;
				for(var premade_preset_key in premade_preset) {
					var premade_preset_obj = premade_preset[premade_preset_key];
					if(premade_preset_obj.type == this.get("type")){
						this.set("class_el", premade_preset_obj.class_el);
						break;
					}
				}
			}
		},
		validate: function(attrs, options){

		},
		parse: function(response){
			return response;
		}
	});
	
})(jQuery, window);

var dfd_header_b = dfd_header_b || {};

(function(){
	'use strict';

	dfd_header_b.Model.Preset = Backbone.Model.extend({
		defaults: {
			name: '',
//			active: 'active',
			isActive: '',
			isDefault: false,
			presetValues: {
				desktop: '',
				tablet: '',
				mobile: ''
			},
			settings: {
				desktop: '',
				tablet: '',
				mobile: '',
				globals: ''
			}
		},
		validate: function(attrs, options) {
			var name = attrs.name;
			if(name == "") {
				return "You must enter the name";
			}
			var count = dfd_header_b.APP.presets.where({name: name, isDefault: false});
			if(count.length > 0) {
				return "Name '" + name + "' already exists";
			}
		},
		initialize: function(models, options) {
			var cid = this.cid;
			var id = this.get("id");
			if(id == "" || typeof id == "undefined"){
				this.set("id", cid);
			}
		},
		parse: function(response) {
			return response;
		}
	});
})();
var dfd_header_b = dfd_header_b || {};

(function(){
	'use strict';

	dfd_header_b.Model.Setting = Backbone.Model.extend({
		defaults: {
			id: "",
			type: "",
			value: "",
			def: "",
			isGlobal : "",
		},

		parse: function(response){
			return response;
		}
	});
})();
/*global Backbone */
var dfd_header_b = dfd_header_b || {};

(function(){
	'use strict';

	dfd_header_b.Collection.Elements = Backbone.Collection.extend({
		model: dfd_header_b.Model.Element,

		parse: function(response){
			return response;
		}
	});
	dfd_header_b.APP.collection = new dfd_header_b.Collection.Elements();
	dfd_header_b.APP.collection_prev = new dfd_header_b.Collection.Elements();

	dfd_header_b.Collection.Presets = Backbone.Collection.extend({
		model: dfd_header_b.Model.Preset,
		parse: function(response){
			return response;
		}
	});  
	dfd_header_b.APP.presets = new dfd_header_b.Collection.Presets();

})(jQuery);

/*global Backbone */
var dfd_header_b = dfd_header_b || {};

(function(){
	'use strict';

	dfd_header_b.Collection.Settings = Backbone.Collection.extend({
		model: dfd_header_b.Model.Setting,
		parse: function(response){
			return response;
		}
	});
	dfd_header_b.APP.settingCollection = new dfd_header_b.Collection.Settings();
	dfd_header_b.APP.globalSettingCollection = new dfd_header_b.Collection.Settings();

})(jQuery);

var dfd_header_b = dfd_header_b || {};
(function($){
	'use strict';
	dfd_header_b.View.MainElementView = Backbone.View.extend({
		mainTemplate: '',
		tagName: 'div',
		tempname: 'dfd_header_t_el',
		width: '',
		n_width: '',
		events: {
			"click .hover-controls .controls-out-tl .delete": "delete",
			"click .hover-controls .controls-out-tl .fullwidth.active": "setFullwidth",
			"touchstart .hover-controls .controls-out-tl .delete": "delete",
			"touchstart .hover-controls .controls-out-tl .fullwidth.active": "setFullwidth",
		},
		delete: function(){
			this.$el.remove();
			dfd_header_b.Helper.addLoader();
			setTimeout(function(){
				dfd_header_b.Helper.saveChanges();
				dfd_header_b.APP.Builder.build();
			}, 100);

		},
		setFullwidth: function(e){
			var canShow = dfd_header_b.View.Setting.canShow();

			var target = e.target;
			this.$el.find(".hover-controls .controls-out-tl .fullwidth").removeClass("active");
			if($(target).hasClass("full")){
				this.$el.find(".hover-controls .controls-out-tl .inline").addClass("active");
			} else {
				this.$el.find(".hover-controls .controls-out-tl .full").addClass("active");
			}
			$(target).removeClass("active");
			this.$el.toggleClass("fullwidth");
			var val = this.model.get("isfullwidth") == true ? false : true;
			this.model.set({isfullwidth: val});
			dfd_header_b.Helper.saveChanges();
			var parent = this.$el.parent();

			parent.css({display: "table"});
			setTimeout(function(){
				parent.css({display: "block"});
				dfd_header_b.Helper.claerTransformMiddleBlock();
				dfd_header_b.Helper.RoundContentTransform();
			}, 100);
		},
		className: function(){
			return this.model.get("class_el") + " c_el port";
		},
		id: function(){
			return this.model.get("id");
		},
		getTemp: function(type){
			var id_el = $('#dfd_header_t_el_' + type);
			return id_el;
		},
		getTtype: function(){
			var type = this.model.get("type");
			var id_el = this.getTemp(type);

			switch (type) {
				case "logo" :
					var logo_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: "logo_header_builder"});
					var logo_model_val_row = logo_model.get("value");
					var logo_model_val = JSON.parse(logo_model_val_row);
					if(logo_model_val.thumb == ""){
						logo_model_val.thumb = dfd_header_b_local_settings.logo_url;
					}
					var big_img = dfd_header_b.Helper.getBigImgFromthumb(logo_model_val.thumb);
					this.model.set("image", big_img);
					break;
				case "text" :
					var text_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: "header_copyright_builder"});
//
					var text_model_val = text_model.get("value");
					this.model.set("value", text_model_val);

					break;
				case "telephone" :
					var text_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: "header_telephone_builder"});
					var text_model_val = text_model.get("value");
					this.model.set("value", text_model_val);

					break;
				case "info" :

					break;
				case "buttonel" :
					var text_model = dfd_header_b.APP.globalSettingCollection.findWhere({id: "header_button_text_builder"});
					var text_model_val = text_model.get("value");
					this.model.set("value", text_model_val);
					break;
			}
			if(id_el.length){
				this.temp = _.template(id_el.html());
				this.model.set("temp", this.temp(this.model.toJSON()));
			} else {
				this.model.set("temp", '');
			}
			this.model.set("id", this.model.cid);

		},
		initialize: function(){
			this.mainTemplate = _.template($('#' + this.tempname).html());
			this.getTtype();
		},
		render: function(){
			return this;
		}
	});
	dfd_header_b.View.ElementView = dfd_header_b.View.MainElementView.extend({
		render: function(){
			this.$el.html(this.mainTemplate(this.model.toJSON()));

			this.$el.attr("data-id", this.model.get("id"));
			var id = this.model.get("id");
			var controls = $(dfd_header_b.HTMLEntity.MainBlocks.controls);
			controls.find("#" + id).remove();
			controls.append(this.el);
			return this;
		}
	});
	dfd_header_b.View.ElementPrevView = dfd_header_b.View.MainElementView.extend({
		render: function(){
			var $this = this;
			this.$el.html(this.mainTemplate(this.model.toJSON()));
			this.$el.attr("data-id", this.model.get("id"));
			var type = this.model.get("type");

			var is_full_width = this.model.get("isfullwidth");

			var canshow = dfd_header_b.View.Setting.canShow();

			if(is_full_width == true && !canshow){
				$this.$el.addClass("fullwidth");
			}

			return this;
		}
	});

})(jQuery);
var dfd_header_b = dfd_header_b || {};

(function($){
	'use strict';

	dfd_header_b.View.AppView = Backbone.View.extend({
		el: '.header_builder_app',
		mainTemplate: '',
		events: {
			"click #open-preset-window": "openPresetWindow",
			"click #add_preset": "addPresetWindow",
			"click .close-notify ": "closeNotify",
		},
		initialize: function(){
			this.listenTo(this, 'all', _.debounce(this.render, 0));
			this.listenTo(dfd_header_b.APP.collection, 'all', _.debounce(this.render, 0));
			this.listenTo(this, 'initSortable', _.debounce(this.initSortable, 0));
			this.listenTo(dfd_header_b.APP.collection, 'add', _.debounce(this.add, 0));
			this.listenTo(dfd_header_b.APP.collection, 'reset', _.debounce(this.reset, 0));
			this.listenTo(dfd_header_b.APP.settingCollection, 'reset', this.buildSettings);
			this.listenTo(dfd_header_b.APP.collection, 'change', _.debounce(this.change, 0));
			this.listenTo(dfd_header_b.APP.collection, 'reInit', _.debounce(this.reInit, 0));
			this.listenTo(dfd_header_b.APP.presets, 'all', _.debounce(this.changeNamePreset, 0));
			this.listenTo(dfd_header_b.APP.presets, 'addToOption', _.debounce(this.AddToOption, 0));
			this.listenTo(this, "firstStart", this.firstStart());

			this.firstStart();

			this.PresetNameTemplate = _.template($('#dfd_header_t_presetname').html());

			this.hideReduxLeftSideBar();
			var $this = this;
			$(dfd_header_b.HTMLEntity.resetBtn).on("click", function(e){
				if($(this).hasClass("reset")){
					$this.resetToDefault();
				} else {
					dfd_header_b.Helper.addLoader();
					$this.clickChangeView(e);
				}

			});
		},
		resetToDefault: function(){
			var isdefault = dfd_header_b.Helper.isDefaultCurentPreset();
			if(isdefault){
				alert("It's default preset. Pleaase copy it to make changes");
				return false;
			}
			var reset = confirm("All elements and settings will be reset to default. Are you shure?");
			if(!reset){
				return false;
			}
			var DefaultPresetAndSettingsVal = dfd_header_b.Helper.getDefaultPresetAndSettingsVal();
			var preset = DefaultPresetAndSettingsVal.preset;
			var settings = DefaultPresetAndSettingsVal.settings;
			dfd_header_b.Config.setPreset(preset);
			dfd_header_b.Config.setSetting(settings);
			dfd_header_b.Helper.addLoader();
			dfd_header_b.changeslider = true;
			dfd_header_b.Helper.checkSetOnDefault();
			setTimeout(function(){
				dfd_header_b.APP.Builder.build();
				dfd_header_b.Dependency.init();
				dfd_header_b.Helper.saveChanges();
			}, 100);
		},
		addPresetWindow: function(){
			tb_show("Add new preset", '#TB_inline?width=750&height=600&inlineId=examplePopup1');
			$("#TB_window").addClass("add-preset");
			dfd_header_b.Config.isnew = true;

			var new_preset = new dfd_header_b.View.Add_Preset();
			new_preset.render();
			dfd_header_b.isClickedNewPreset = true;
			return false;
		},
		firstStart: function(){
			var DefaultPresetAndSettingsVal = dfd_header_b.Helper.getDefaultPresetAndSettingsVal();
			var preset = DefaultPresetAndSettingsVal.preset;
			var settings = DefaultPresetAndSettingsVal.settings;
			
			dfd_header_b.Config.setPreset(preset);
			dfd_header_b.Config.setSetting(settings);
			dfd_header_b.Helper.addLoader();
			dfd_header_b.changeslider = true;
			dfd_header_b.APP.Builder.build(false);
			dfd_header_b.Helper.checkSetOnDefault();
			setTimeout(function(){
				dfd_header_b.APP.Builder.build();
			},100);
		},
		/**
		 * Split dfd_header_b.APP.settingCollection to two collection(GLobal and local)
		 */
		buildSettings: function(){
			var glob_set = dfd_header_b.Config.getGlobalSetting();
			if(glob_set != "" && typeof glob_set != "undefined"){
				dfd_header_b.Helper.normalizeGlobalSetting();
				dfd_header_b.Config.getGlobalSetting();
				return false;
			}
			dfd_header_b.APP.globalSettingCollection.reset();
			var selectGlobal = dfd_header_b.APP.settingCollection.where({isGlobal: "true"});
			dfd_header_b.APP.settingCollection.remove(selectGlobal);
			dfd_header_b.APP.globalSettingCollection.add(selectGlobal);

			dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
		},
		closeNotify: function(){
			var notify = this.$el.find(".header-app-notify");
			var wrap = notify.find(".wrap");
			wrap.css({
				transform: 'translateY(-100px)',
				opacity: '0'
			});
			notify.css("display", "none");
			setTimeout(function(){
				notify.css("visibility", "hidden");
			}, 100);
		},
		settingReset: function(){
			dfd_header_b.Config.setSettingByView(dfd_header_b.APP.settingCollection.toJSON());
		},
		settingResetInit: function(){
			dfd_header_b.View.Setting.init();
		},
		addNotiy: function(){
			if(dfd_header_b.isFirstStart == false && dfd_header_b.isnotifyEnable == true){
				var notify = this.$el.find(".header-app-notify");
				notify.css({
					"visibility": "visible",
					"display": "block"
				});
				var wrap = notify.find(".wrap");
				setTimeout(function(){
					wrap.css({
						transform: 'translateY(0%)',
						opacity: '1'
					});
				}, 100);
				window.onbeforeunload = confirmOnPageExit;
			}
			dfd_header_b.isFirstStart = false;
			dfd_header_b.isnotifyEnable = true;
		},
		AddToOption: function(){
			var options = dfd_header_b.Helper.stringifyValus();
			var input = $(dfd_header_b.HTMLEntity.optionInput);
			input.prop("value", "");
			input.val(options);
			this.addNotiy();
		},
		changeNamePreset: function(){
			var name = "";
			var preset_name_obj = this.$el.find(".curent-preset-name-app");
			preset_name_obj.html("");
			var curent_preset = dfd_header_b.APP.presets.findWhere({isActive: "active"});
			if(_.isObject(curent_preset)){
				name = curent_preset.get("name");
			}

			preset_name_obj.append(this.PresetNameTemplate({preset_name: name}));
		},
		openPresetWindow: function(){
			dfd_header_b.Helper.openPresetWindow();
		},
		clickChangeView: function(e){
			var $this = this;
			var target = $(e.target);
			var target_siblings = target.parent().siblings();
			target_siblings.removeClass("options-button-green");
			target_siblings.addClass("options-button-green-border");
			target.parent().removeClass("options-button-green-border");
			target.parent().addClass("options-button-green");
			var val = target.data("val");
			switch (val) {
				case "desktop" :
					dfd_header_b.Config.setDesktopView();
					break;
				case "tablet" :
					dfd_header_b.Config.setTabletView();
					break;
				case "mobile" :
					dfd_header_b.Config.setMobileView();
					break;
			}
			$this.$el.removeClass("tablet").removeClass("mobile").removeClass("desktop");
			$this.$el.addClass(val);

			setTimeout(function(){
				dfd_header_b.APP.Builder.build();
			}, 100);
		},
		add: function(model){
			var element = new dfd_header_b.View.ElementView({model: model});
			element.render();
		},
		change: function(ev, collect, prev){
		},
		reInit: function(ev, collect, prev){
			dfd_header_b.APP.collection.trigger("reset");
			this.$el.find(".wrapper").removeAttr("style");
			dfd_header_b.Helper.setDelimiterWidth();
			dfd_header_b.Helper.claerTransformMiddleBlock();
			dfd_header_b.Helper.RoundContentTransform();
			dfd_header_b.Helper.removeLoader();

		},
		reset: function(collect, prev){
			var $this = this;
			this.$el.find("#dfd_header_t_controls").html("");
			dfd_header_b.APP.collection.each(this.add, this);
			this.trigger("initSortable");

		},
		hideReduxLeftSideBar: function(){
			var par = this.$el.parentsUntil(".redux-group-tab");
			var main_tab = $(par[4]).parent();
			main_tab.find("h2:first-child").append("<span> (Beta v0.1)</span>");
			main_tab.addClass("header_builder_redux_tab");
			par.find("tr:first-child > th").hide();
			par.find("tr:first-child > td").attr("colspan", 2);
			var sidebar = $(".redux-sections-wrap .redux-sidebar");

			var PresetTemplate = _.template($("#dfd_header_t_el_preset").html());
			sidebar.append(PresetTemplate());
			new dfd_header_b.View.Presets_View().render();
		},
		initSortable: function(){
			dfd_header_b.APP.Sortable.init();
		},
		render: function(){

			return this;
		}
	});

})(jQuery);
var dfd_header_b = dfd_header_b || {};

(function($){
	'use strict';

	dfd_header_b.View.SettingsView = Backbone.View.extend({
		el: '#71_section_group',
		mainTemplate: '',
		events: {
		},
		initialize: function(){
			var $this = this;


			var BtnShowTopPanel = $("input[name='" + dfd_header_b.View.Setting.BtnShowTopPanel + "']");
			var BtnShowMidPanel = $("input[name='" + dfd_header_b.View.Setting.BtnShowMidPanel + "']");
			var BtnShowBotPanel = $("input[name='" + dfd_header_b.View.Setting.BtnShowBotPanel + "']");

			var BtnTopAbstract = $("input[name='" + dfd_header_b.View.Setting.BtnTopAbstract + "']");
			var BtnMidAbstract = $("input[name='" + dfd_header_b.View.Setting.BtnMidAbstract + "']");
			var BtnBotAbstract = $("input[name='" + dfd_header_b.View.Setting.BtnBotAbstract + "']");

			var BtnLogoImg = $("input[name='" + dfd_header_b.View.Setting.BtnLogoImg + "[id]" + "']");
			var BtnRetinaLogoImg = $("input[name='" + dfd_header_b.View.Setting.BtnRetinaLogoImg + "[id]" + "']");

			var BtnTopBgColor = $("input[name='" + dfd_header_b.View.Setting.BtnTopBgColor + "']");

			var BtnShowSticky = $("input[name='" + dfd_header_b.View.Setting.BtnSticky + "']");


			var BtnSliderTopHeight = $("input[name='" + dfd_header_b.View.Setting.BtnsliderTopHeight + "']");

			/**
			 * 
			 */
			BtnTopAbstract.next().on("click", function(e){
				dfd_header_b.View.Input.triggerBtn.triggerOptionLocal("set_top_panel_abstract_builder");
			});
			BtnMidAbstract.next().on("click", function(e){
				dfd_header_b.View.Input.triggerBtn.triggerOptionLocal("set_mid_panel_abstract_builder");
			});
			BtnBotAbstract.next().on("click", function(e){
				dfd_header_b.View.Input.triggerBtn.triggerOptionLocal("set_bot_panel_abstract_builder");
			});
			/**
			 * 
			 */
			BtnShowTopPanel.next().on("click", function(e){
				dfd_header_b.View.Setting.triggerOption("show_top_panel_builder");
			});
			BtnShowMidPanel.next().on("click", function(e){
				dfd_header_b.View.Setting.triggerOption("show_mid_panel_builder");
			});
			BtnShowBotPanel.next().on("click", function(e){
				dfd_header_b.View.Setting.triggerOption("show_bot_panel_builder");
			});


			BtnLogoImg.on("change", this, function(e){
				dfd_header_b.View.Setting.triggerImageGlobal("logo_header_builder");

			});
			BtnRetinaLogoImg.on("change", this, function(e){
				dfd_header_b.View.Setting.triggerImageGlobal("retina_logo_header_builder");
			});

			BtnShowSticky.next().on("click", function(e){
				dfd_header_b.View.Input.triggerBtn.triggerOption("header_sticky_builder");
			});

		},
		changeCheckbox: function(e){
			e.preventDefault();
			return false;
			var val = $(e.target).val();
		},
		render: function(){
			return this;
		}
	});
	dfd_header_b.View.Setting = {
		BtnShowTopPanel: "native[show_top_panel_builder]",
		BtnShowMidPanel: "native[show_mid_panel_builder]",
		BtnShowBotPanel: "native[show_bot_panel_builder]",
		BtnTopAbstract: "native[set_top_panel_abstract_builder]",
		BtnMidAbstract: "native[set_mid_panel_abstract_builder]",
		BtnBotAbstract: "native[set_bot_panel_abstract_builder]",
		BtnLogoImg: "native[logo_header_builder]",
		BtnRetinaLogoImg: "native[retina_logo_header_builder]",
		BtnTopBgColor: "native[header_top_background_color_build]",
		BtnSticky: "native[header_sticky_builder]",
		BtnsliderTopHeight: "native[top_header_height_builder]",
		getValueByName: function(name){
			var $prop = "getObj_" + name;
			var val = dfd_header_b.View.Setting[$prop]().val();
			return val;
		},
		/* Get Property from HTML*/
		getObj_show_top_panel_builder: function(){
			return  $("input:checked[name='" + this.BtnShowTopPanel + "']");
		},
		getObj_show_mid_panel_builder: function(){
			return  $("input:checked[name='" + this.BtnShowMidPanel + "']");
		},
		getObj_show_bot_panel_builder: function(){
			return  $("input:checked[name='" + this.BtnShowBotPanel + "']");
		},
		getObj_set_top_panel_abstract_builder: function(){
			return  $("input:checked[name='" + this.BtnTopAbstract + "']");
		},
		getObj_set_mid_panel_abstract_builder: function(){
			return  $("input:checked[name='" + this.BtnMidAbstract + "']");
		},
		getObj_set_bot_panel_abstract_builder: function(){
			return  $("input:checked[name='" + this.BtnBotAbstract + "']");
		},
		getObj_header_sticky_builder: function(){
			return  $("input:checked[name='" + this.BtnSticky + "']");
		},
		getObj_logo_header_builder: function(){
			var obj = {};
			obj.id = $("input[name='" + this.BtnLogoImg + "[id]']");
			obj.thumb = $("input[name='" + this.BtnLogoImg + "[thumbnail]']");
			return  obj;
		},
		getObj_retina_logo_header_builder: function(){
			var obj = {};
			obj.id = $("input[name='" + this.BtnRetinaLogoImg + "[id]']");
			obj.thumb = $("input[name='" + this.BtnRetinaLogoImg + "[thumbnail]']");
			return  obj;
		},
		/***/
		init: function(){
			var settings = dfd_header_b.Config.getCurrentSetting();
			this.settingFactoryInit(settings);

			var global_setting = dfd_header_b.Config.getGlobalSetting();
			this.settingFactoryInit(global_setting, true);
//			dfd_header_b.Helper.SetColor();

			var self = this;
			setTimeout(function(){
				self.reInit();
			}, 100);
			dfd_header_b.isInitColorPicker = true;
			dfd_header_b.isInitSlider = true;
			dfd_header_b.changeslider = false;

		},
		settingFactoryInit: function(settings, par){

			for(var i in settings) {
				var setting = settings[i];
				if(setting != null){
					switch (setting.type) {
						case "trigger" :
							dfd_header_b.View.Input.triggerBtn.init(setting);
							break;
						case "image" :
							dfd_header_b.View.Input.image.init(setting);
							break;
						case "colorpicker" :
							dfd_header_b.View.Input.colorpicker.init(setting);
							break;
						case "slider" :
							dfd_header_b.View.Input.slider.init(setting);
							break;
						case "image_select" :
							dfd_header_b.View.Input.image_select.init(setting);
							break;
						case "radio" :
							dfd_header_b.View.Input.radio.init(setting);
							break;
						case "text" :
							dfd_header_b.View.Input.text.init(setting);
							break;
						case "telephone" :
							dfd_header_b.View.Input.telephone.init(setting);
							break;
					}
				}

			}

		},
		reInit: function(){
			setTimeout(function(){
				var top = $("#dfd_header_t_preview .container.row.top");
				var top_abs = $("#native-set_top_panel_abstract_builder").parent().parent();
				var top_bg_color = $("#native-header_top_background_color_build").parent().parent();
				var top_text_color = $("#native-header_top_text_color_build").parent().parent();

				var mid = $("#dfd_header_t_preview .container.row.middle");
				var mid_abs = $("#native-set_mid_panel_abstract_builder").parent().parent();
				var mid_bg_color = $("#native-header_mid_background_color_build").parent().parent();
				var mid_text_color = $("#native-header_mid_text_color_build").parent().parent();

				var bot = $("#dfd_header_t_preview .container.row.bottom");
				var bot_abs = $("#native-set_bot_panel_abstract_builder").parent().parent();
				var bot_bg_color = $("#native-header_bot_background_color_build").parent().parent();
				var bot_text_color = $("#native-header_bot_text_color_build").parent().parent();

				var header_style = dfd_header_b.View.Setting.getHeaderStyle();
				if(header_style == "side" && dfd_header_b.Config.getCurentView() == "desktop"){
					top_abs.hide();
					top_bg_color.hide();
					top_text_color.show();

					mid_abs.hide();
					mid_bg_color.hide();
					mid_text_color.show();

					bot_abs.hide();
					bot_bg_color.hide();
					bot_text_color.show();
				} else {
					if(dfd_header_b.View.Setting.isShowTopPanel()){
						top.show();
						top_abs.show();
						top_bg_color.show();
						top_text_color.show();
					} else {
						top.hide();
						top_abs.hide();
						top_bg_color.hide();
						top_text_color.hide();
					}
					if(dfd_header_b.View.Setting.isShowMidPanel()){
						mid.show();
						mid_abs.show();
						mid_bg_color.show();
						mid_text_color.show();
					} else {
						mid.hide();
						mid_abs.hide();
						mid_bg_color.hide();
						mid_text_color.hide();
					}
					if(dfd_header_b.View.Setting.isShowBotPanel()){
						bot.show();
						bot_abs.show();
						bot_bg_color.show();
						bot_text_color.show();
					} else {
						bot.hide();
						bot_abs.hide();
						bot_bg_color.hide();
						bot_text_color.hide();
					}
				}

				$("#dfd_header_t_preview .container").css({
					"border-bottom-width": "0px"
				});
				$("#dfd_header_t_preview .container:visible").last().css({
					"border-bottom-width": "1px",
					"border-bottom-style": "solid",
				});
			}, 100);


		},
		triggerImageGlobal: function(name){
			setTimeout(function(){

				var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: name});
				var $prop = "getObj_" + name;
				var img_obj = dfd_header_b.View.Setting[$prop]();
				var prepare = {
					id: img_obj.id.val(),
					thumb: img_obj.thumb.val()
				};
				var new_value = JSON.stringify(prepare);
				model.set({
					value: new_value
				});
				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
				dfd_header_b.Helper.saveChanges();
				dfd_header_b.APP.Builder.build();
			}, 100);
		},
		triggerOption: function(name){
			var $this = this;
			setTimeout(function(){
				$this.useCheckbox(name);
				dfd_header_b.View.Setting.reInit();
			}, 200);
		},
		useCheckbox: function(name){


			var set = dfd_header_b.Config.getCurrentSetting();
			dfd_header_b.APP.settingCollection.reset();
			dfd_header_b.APP.settingCollection.reset(set);
			var model = dfd_header_b.APP.settingCollection.findWhere({id: name});
			if(!_.isObject(model)){
				dfd_header_b.APP.settingCollection.reset(dfd_header_b.PreSetting);
				dfd_header_b.Config.setSettingByView(dfd_header_b.APP.settingCollection.toJSON());
				var model = dfd_header_b.APP.settingCollection.findWhere({id: name});
			}

			var $prop = "getObj_" + name;
			var val = dfd_header_b.View.Setting[$prop]().val();
			model.set(
					{
						value: val
					});
			dfd_header_b.Config.setSettingByView(dfd_header_b.APP.settingCollection.toJSON());
			dfd_header_b.Helper.saveChanges();
			dfd_header_b.APP.Builder.build(false);

		},
		isShowTopPanel: function(){
			var val = $("input:checked[name='" + this.BtnShowTopPanel + "']").val();
			if(val == "on"){
				return true;
			}
			return false;
		},
		isShowMidPanel: function(){
			var val = $("input:checked[name='" + this.BtnShowMidPanel + "']").val();
			if(val == "on"){
				return true;
			}
			return false;
		},
		isShowBotPanel: function(){
			var val = $("input:checked[name='" + this.BtnShowBotPanel + "']").val();
			if(val == "on"){
				return true;
			}
			return false;
		},
		getHeaderStyleFromObj: function(){
			return $("input:checked[name='native[style_header_builder]']").val();
		},
		canShow: function(){
			var val = this.getHeaderStyleFromObj();
			var curView = dfd_header_b.Config.getCurentView();
			if(val == "side" && curView == "desktop"){
				return false;
			}
			return true;
		},
		getHeaderStyle: function(){
			var model = dfd_header_b.APP.globalSettingCollection.findWhere({"id": "style_header_builder"});
			if(_.isObject(model)){
				return model.get("value");
			}
			return  "";
		}
	};
	dfd_header_b.View.Input.triggerBtn = {
		init: function(setting){
			var id = setting.id;
			var $this = this;
			var checkboxes = $("input[name='native[" + id + "]']");
			var checkboxes_checked = $("input:checked[name='native[" + id + "]']");
			checkboxes.removeAttr("checked");
			checkboxes.each(function(){

				var val = $(this).val();
				if(val == "on"){
					if(setting.value == "on"){
						$(this).attr("checked", "checked");

					}
					if(setting.value == "" && setting.def == "on"){
						$(this).attr("checked", "checked");
					}
				}
				if(val == "off"){
					if(setting.value == "off"){
						$(this).attr("checked", "checked");
					}
					if(setting.value == "" && setting.def == "off"){
						$(this).attr("checked", "checked");
					}
				}

			});
			var checkboxes_checked_val = $("input:checked[name='native[" + id + "]']").val();
			var parent = checkboxes_checked.parent();
			var btn_anim_obj = parent.find(".button-animation");
			var left_corner = parent.find(".ui-corner-left");
			var right_corner = parent.find(".ui-corner-right");
			if(checkboxes_checked_val == "on"){
				btn_anim_obj.removeClass("right-active");

				right_corner.removeClass("ui-state-active");
				left_corner.addClass("ui-state-active");
			}
			if(checkboxes_checked_val == "off"){
				btn_anim_obj.addClass("right-active");

				left_corner.removeClass("ui-state-active");
				right_corner.addClass("ui-state-active");
			}

			setTimeout(function(){
				var checkboxes_checked = $("input:checked[name='native[" + id + "]']");
				var checkbox_val = checkboxes_checked.val();
				$this.VisualReInit(id, checkbox_val);
			}, 50);
		},
		VisualReInit: function(name, val){

			var switcher = function(obj){

				if(val == "on"){
					obj.addClass("absolute");
				} else {
					obj.removeClass("absolute");
				}
			};
			switch (name) {
				case 'set_top_panel_abstract_builder' :
					var obj = $("#dfd_header_t_preview .container.top");
					switcher(obj, val);
					break;
				case 'set_mid_panel_abstract_builder' :
					var obj = $("#dfd_header_t_preview .container.middle");
					switcher(obj, val);
					break;
				case 'set_bot_panel_abstract_builder' :
					var obj = $("#dfd_header_t_preview .container.bottom");
					switcher(obj, val);
					break;
			}
		},
		triggerOptionLocal: function(name){
			var $this = this;
			setTimeout(function(){

				var model = dfd_header_b.APP.settingCollection.findWhere({id: name});
				if(!_.isObject(model)){
//				throw "Model id not found";
					dfd_header_b.APP.settingCollection.reset(dfd_header_b.PreSetting);
					dfd_header_b.Config.setSettingByView(dfd_header_b.APP.settingCollection.toJSON());
					var model = dfd_header_b.APP.settingCollection.findWhere({id: name});
				}
				var val = $("input:checked[name='native[" + name + "]']").val();

				model.set(
						{
							value: val
						});
				dfd_header_b.Config.setSettingByView(dfd_header_b.APP.settingCollection.toJSON());
				dfd_header_b.Helper.saveChanges();
				$this.VisualReInit(name, val);
			}, 200);
		},
		triggerOption: function(name){
			var $this = this;

			setTimeout(function(){

				var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: name});
				var val = dfd_header_b.View.Setting.getValueByName(name);
				model.set({
					value: val
				});
				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
				dfd_header_b.Helper.saveChanges();
			}, 200);
		}
	};
	dfd_header_b.View.Input.image = {
		init: function(setting){
			var $this = this;
			var id = setting.id;
			if(setting.value == ""){
				return false;
			}
			var value = JSON.parse(setting.value);
			var image_id = $("input[name='native[" + id + "][id]']");
			var image_thumb = $("input[name='native[" + id + "][thumbnail]']");
			var remove_btn = image_id.parent().find(".buttons-cover");
			var parent = image_id.parent();

//			image_id.val(value.id);
//			image_thumb.val(value.thumb);
//			parent.find(".screenshot img").attr("src", value.thumb);

			switch (id) {
				case "bg_image_side_header_builder" :
					if(dfd_header_b.isInitColorPicker == false){
						image_id.on("change", function(){
							$this.VisualreInit(id);
							$this.triggerOption(id);
						});
						remove_btn.on("click", ".remove-image", function(){
							$this.VisualreInit(id);
							$this.triggerOption(id);
						});
					}
					this.VisualreInit(id);
					break;
				case "logo_header_builder":
					if(value.thumb == ""){
						value.thumb = dfd_header_b_local_settings.logo_url;
					}
					break;
				case "retina_logo_header_builder":
					if(value.thumb == ""){
						value.thumb = dfd_header_b_local_settings.retina_url;
					}
					break;
			}
			image_id.val(value.id);
			image_thumb.val(value.thumb);
			parent.find(".screenshot img").attr("src", value.thumb);
		},
		VisualreInit: function(id){

			setTimeout(function(){
				var style = dfd_header_b.View.Setting.getHeaderStyle();
				var cur_view = dfd_header_b.Config.getCurentView();
				var image_id = $("input[name='native[" + id + "][id]']").val();
				var image_thumb = $("input[name='native[" + id + "][thumbnail]']").val();

				switch (id) {
					case "bg_image_side_header_builder" :
						if(style == "side" && cur_view == "desktop"){
							var big_img = "";
							if(image_thumb){
								big_img = dfd_header_b.Helper.getBigImgFromthumb(image_thumb);
							}
							$("#dfd_header_t_preview .dfd_header_t_preview_wrapper").css({
								"background-image": "url(" + big_img + ")"
							});
						} else {
							$("#dfd_header_t_preview .dfd_header_t_preview_wrapper").css({
								"background-image": "none"
							});
						}
						break;
				}
			}, 100);

		},
		triggerOption: function(id, val){
			setTimeout(function(){

				var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: id});
				var obj = {};
				obj.id = $("input[name='native[" + id + "][id]']");
				obj.thumb = $("input[name='native[" + id + "][thumbnail]']");
				var img_obj = obj;
				var prepare = {
					id: img_obj.id.val(),
					thumb: img_obj.thumb.val()
				};
				var new_value = JSON.stringify(prepare);
				model.set({
					value: new_value
				});
				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
				dfd_header_b.Helper.saveChanges();
			}, 100);
		}
	};
	dfd_header_b.View.Input.colorpicker = {
		transparentImgUrl: "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==)",
		init: function(setting){
			var id = setting.id;
			if(setting.value == ""){
				return false;
			}
			var value = JSON.parse(setting.value);
			var colorpicker_obj = $("input[name='native[" + id + "]']");
			if(setting.hidetransparent == "true"){
				colorpicker_obj.parent().parent().parent().find(".color-transparency-check").hide();
			}

			var bg_image_obj = colorpicker_obj.parent().parent().find(".wp-color-result");

			if(value.is_transparent == "true"){
				$("#" + id + "-transparency").attr("checked", "true");
				bg_image_obj.find("span").css({"background-image": this.transparentImgUrl});
				colorpicker_obj.val("transparent");
			} else {
				if(value.color == ""){
					value.color = setting.def;
				}
				setTimeout(function(){
					$("#" + id + "-transparency").removeAttr("checked");

					bg_image_obj.find("span").css({"background": value.color});
					colorpicker_obj.val(value.color);
				}, 200);

			}


			if(value.is_transparent == "true"){
				bg_image_obj.css({"background-image": this.transparentImgUrl});
			} else {
				bg_image_obj.css({"background-image": "none"});
				bg_image_obj.find("span").css("background-color", value.color);
			}


			if(dfd_header_b.isInitColorPicker == false){
				this.event(setting);
			}
		},
		VisualreInit: function(setting){

			var value = JSON.parse(setting.value);
			if(value.is_transparent == "true"){
				value.color = "transparent";
			} else {
				if(value.color == ""){
					value.color = setting.def;
				}
			}

			switch (setting.id) {
				case "header_top_background_color_build" :
					var CanUseOptionInSideHeader = dfd_header_b.Helper.CanUseOptionInSideHeader();
					if(CanUseOptionInSideHeader){
						value.color = "initial";
					}
					$("#dfd_header_t_preview .container.top").css("background-color", value.color);
					break;
				case "header_mid_background_color_build" :
					var CanUseOptionInSideHeader = dfd_header_b.Helper.CanUseOptionInSideHeader();
					if(CanUseOptionInSideHeader){
						value.color = "initial";
					}
					$("#dfd_header_t_preview .container.middle").css("background-color", value.color);
					break;
				case "header_bot_background_color_build" :
					var CanUseOptionInSideHeader = dfd_header_b.Helper.CanUseOptionInSideHeader();
					if(CanUseOptionInSideHeader){
						value.color = "initial";
					}
					$("#dfd_header_t_preview .container.bottom").css("background-color", value.color);
					break;
				case "header_top_text_color_build" :
					$("#dfd_header_t_preview .container.top").css("color", value.color);
					$("#dfd_header_t_preview .container.top .dl-menuwrapper a span").css("background", value.color);
					$("#dfd_header_t_preview .container.top .top-inner-page > span span").css("background", value.color);
					break;
				case "header_mid_text_color_build" :
					$("#dfd_header_t_preview .container.middle").css("color", value.color);
					$("#dfd_header_t_preview .container.middle .dl-menuwrapper a span").css("background", value.color);
					$("#dfd_header_t_preview .container.middle .top-inner-page > span span").css("background", value.color);
					break;
				case "header_bot_text_color_build" :
					setTimeout(function(){
						$("#dfd_header_t_preview .container.bottom").css("color", value.color);
						$("#dfd_header_t_preview .container.bottom .dl-menuwrapper a span").css("background", value.color);
						$("#dfd_header_t_preview .container.bottom .top-inner-page > span span").css("background", value.color);
					}, 100);
					break;
				case "header_border_color_build" :
					setTimeout(function(){
						$("#dfd_header_t_preview .container").css("border-color", value.color);
						$("#dfd_header_t_preview .dfd-header-delimiter").css("border-color", value.color);
						$("#dfd_header_t_preview .Delimiter").css("border-color", value.color);
//						$("#dfd_header_t_controls .Delimiter").css("border-color", value.color);
					}, 200);
					break;
				case "header_side_background_color_builder":
					var CanUseOptionInSideHeader = dfd_header_b.Helper.CanUseOptionInSideHeader();
					if(!CanUseOptionInSideHeader){
						value.color = "initial";
					}
					$("#dfd_header_t_preview .dfd_header_t_preview_wrapper").css({
						"background-color": value.color
					});
					break;
			}
		},
		trrigerOption: function(setting, val){

			var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: setting.id});
			if(!_.isObject(model)){
				var model = dfd_header_b.APP.settingCollection.findWhere({id: setting.id});
			}
			var color = "";
			var is_transparent = "false";
			if(val == "transparent"){
				is_transparent = "true";
			} else {
				is_transparent = "false";
			}
			if(val == ""){
				color = model.get("def");
				if(color == ""){
					for(var k in dfd_header_b.PreSetting) {
						var obj = dfd_header_b.PreSetting[k];
						if(obj.id == setting.id){
							color = obj.def;
							break;
						}
					}
				}
			} else {
				color = val;
			}
			var prepare = {
				color: color,
				is_transparent: is_transparent
			};
			var new_value = JSON.stringify(prepare);
			setting.value = new_value;
			if(_.isObject(model)){
				model.set({
					value: new_value
				});
			} else {
				throw "not found model by id = " + setting.id;
			}

			dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
			dfd_header_b.Config.setSettingByView(dfd_header_b.APP.settingCollection.toJSON());
			dfd_header_b.Helper.saveChanges();
			dfd_header_b.Helper.SetColor();
		},
		event: function(setting){
			var id = setting.id;
			var $this = this;
			setTimeout(function(){
				var $count = 0;
				var $input = $("input[name='native[" + id + "]']");
				var $main_obj = $input.parent().parent().parent();
				var $handler = $main_obj.find(".wp-color-result");
				var $transparent_btn = $main_obj.find(".color-transparency-check input");

				$transparent_btn.on("change click", function(){
					var val = $input.val();
					if(val == ""){
						var saved_color = $("#" + id + "-saved-color").val();
						if(saved_color){
							val = saved_color;
						} else {
							val = $(this).parent().parent().find(".wp-picker-container a span").css("background-color");
						}
						$("input[name='native[" + id + "]']").val(val);
					}
					$this.trrigerOption(setting, val);

				});
				$handler.on("click", function(){
					var $self = $(this);
					var refreshIntervalId = setInterval(function(){
						if($self.hasClass("wp-picker-open")){
						} else {
							var val = $("input[name='native[" + id + "]']").val();
							$this.trrigerOption(setting, val);
							clearInterval(refreshIntervalId);
						}
						$count++;

					}, 500);
				});
			}, 300);

		}
	};
	dfd_header_b.View.Input.slider = {
		init: function(setting){
			var $this = this;
			var id = setting.id;
			var slider_obj = $("input[name='native[" + id + "]']");
			var data = slider_obj.next();
			var data_max_val = data.data("max");
			var slide_val = ((setting.value - 35) / data_max_val) * 100;
			slide_val = slide_val + "%";
			data.find(".noUi-background").css("left", slide_val);
			slider_obj.val(setting.value);

			if(dfd_header_b.changeslider == true){
				setTimeout(function(){
					redux.args.disable_save_warn = true;
					slider_obj.trigger("change");
					$("#redux_notification_bar").remove();
				}, 100);
			}

			this.visualReInit(setting, setting.value);

			if(dfd_header_b.isInitSlider == false){
				$this.event(setting);
			}
		},
		event: function(setting){
			var id = setting.id;
			var $this = this;
			var $input = $("input[name='native[" + id + "]']");
			$input.on("blur", function(){
				var val = $input.val();
				$this.triggerOption(setting, val);
//				}
			});

			$input.next().on("change", function(){
				var val = $input.val();
				$this.triggerOption(setting, val);
			});
		},
		visualReInit: function(setting, val){
			var value = val + "px";

			switch (setting.id) {
				case "top_header_height_builder" :
					if(!dfd_header_b.Helper.CanUseOptionInSideHeader()){
						$("#dfd_header_t_preview .container.top").css({
							"height": value,
							"min-height": value,
							"line-height": value
						});
					}

					break;
				case "mid_header_height_builder" :
					if(!dfd_header_b.Helper.CanUseOptionInSideHeader()){
						$("#dfd_header_t_preview .container.middle").css({
							"height": value,
							"min-height": value,
							"line-height": value
						});
					}
					break;
				case "bot_header_height_builder" :
					if(!dfd_header_b.Helper.CanUseOptionInSideHeader()){
						$("#dfd_header_t_preview:not(.side-header) .container.bottom").css({
							"height": value,
							"min-height": value,
							"line-height": value
						});
					}
					break;
				case "header_side_bar_width_builder" :
					var style = dfd_header_b.View.Setting.getHeaderStyle();
					var cur_view = dfd_header_b.Config.getCurentView();
					if(style == "side" && cur_view == "desktop"){
						$("#dfd_header_t_preview .dfd_header_t_preview_wrapper").css({
							"width": value,
						});
					} else {
						$("#dfd_header_t_preview .dfd_header_t_preview_wrapper").css({
							"width": "100%",
						});
					}
					dfd_header_b.Helper.setDelimiterWidth();
					dfd_header_b.Helper.SetColor();
					break;
			}
			dfd_header_b.Helper.calculateOptimalLogoWidth();
		},
		triggerOption: function(setting, val){
			var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: setting.id});

			if(_.isObject(model)){
				model.set({
					value: val
				});
			} else {
				throw "not found model by id = " + setting.id;
			}

			dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
			dfd_header_b.Helper.saveChanges();
			this.visualReInit(setting, val)
		},
	};
	dfd_header_b.View.Input.image_select = {
		init: function(setting){
			var id = setting.id;
			var value = setting.value;
			var $this = this;
			var checkboxes = $("input[name='native[" + id + "]']");
			var checkboxes_checked = $("input:checked[name='native[" + id + "]']");
			checkboxes.removeAttr("checked");
			checkboxes.each(function(){
				var ch_value = $(this).val();
				if(ch_value == value){
					$(this).attr("checked", "checked");
					$(this).parent().addClass("redux-image-select-selected");
				} else {
					$(this).parent().removeClass("redux-image-select-selected");
				}

			});
			$("#dfd_header_t_preview .container.bottom").css({
				"height": "",
				"min-height": "",
				"line-height": ""
			});
			if(dfd_header_b.isInitColorPicker == false){
				checkboxes.parent().on("click", function(){
					dfd_header_b.Helper.addLoader();
					$this.VisualReInit(id);
					$this.triggerOption(id);
					return false;
				});
			}
			this.VisualReInit(id);
		},
		VisualReInit: function(id){
			var checkboxes = $("input[name='native[" + id + "]']");
			var checkboxes_checked = $("input:checked[name='native[" + id + "]']");
			var prev = $("#dfd_header_t_preview");
			switch (checkboxes_checked.val()) {
				case "horizontal" :
					prev.addClass("horiz-header");
					prev.removeClass("side-header");
					prev.removeClass("boxed-header");


					break;
				case "side" :
					var view = dfd_header_b.Config.getCurentView();
					if(view == "desktop"){
						prev.addClass("side-header");
						prev.removeClass("horiz-header");
						prev.removeClass("boxed-header");
						$("#dfd_header_t_preview .container.bottom").css({
							"height": "",
							"min-height": "",
							"line-height": ""
						});
					}

					break;
				case "boxed" :
					prev.removeClass("side-header");
					prev.removeClass("horiz-header");
					prev.addClass("boxed-header");

					break
			}

		},
		triggerOption: function(name){
			var $this = this;
			var scroll= $("#dfd_header_t_preview").scrollTop();
			$("body").scrollTop(scroll + 500);
			setTimeout(function(){

				var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: name});
				var checkboxes_checked = $("input:checked[name='native[" + name + "]']");
				var val = checkboxes_checked.val();
				model.set({
					value: val
				});

				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());

				dfd_header_b.Helper.saveChanges();
				dfd_header_b.APP.Builder.build();
			}, 300);
		}
	};
	dfd_header_b.View.Input.radio = {
		init: function(setting){
			var id = setting.id;
			var value = setting.value;
			var $this = this;
			var checkboxes = $("input[name='native[" + id + "]']");
			var checkboxes_checked = $("input:checked[name='native[" + id + "]']");
			checkboxes.removeAttr("checked");
			checkboxes.each(function(){
				if($(this).val() == value){
					$(this).attr("checked", "checked");
				}
			});
			if(dfd_header_b.isInitColorPicker == false){
				checkboxes.parent().on("click", function(){
					$this.VisualReInit(id);
					$this.triggerOption(id);
				});
			}
			this.VisualReInit(id);
		},
		VisualReInit: function(id){
			setTimeout(function(){
				var val = $("input:checked[name='native[" + id + "]']").val();
				var prev = $("#dfd_header_t_preview");
				switch (id) {
					case "header_alignment_builder" :
						var posible_values = [
							"left",
							"right",
						];
						dfd_header_b.Helper.classSwitcher(val, posible_values, prev, "header_alignment");
						break;
					case "header_content_alignment_builder" :
						var posible_values = [
							"alignleft",
							"alignright",
							'aligncenter',
						];
						dfd_header_b.Helper.classSwitcher(val, posible_values, prev, "header_content_alignment");
						break;
					case "header_bg_position_builder":
						var posible_values = [
							"center-center",
							"top",
							'top-right',
							'right',
							'right-bottom',
							'bottom',
							'bottom-left',
							'left',
							'left-top'
						];
						dfd_header_b.Helper.classSwitcher(val, posible_values, prev, "header_bg_position");
						break;
					case "header_bg_size_builder":
						var posible_values = [
							"cover",
							"contain",
							"initial",
						];
						dfd_header_b.Helper.classSwitcher(val, posible_values, prev, "header_bg_size");
						break;
					case "header_bg_repeat_builder":
						var posible_values = [
							"repeat",
							"no-repeat",
						];
						dfd_header_b.Helper.classSwitcher(val, posible_values, prev, "header_bg_repeat");
						break;
				}
			}, 100);
		},
		triggerOption: function(name){
			var $this = this;
			var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: name});
			var checkboxes_checked = $("input:checked[name='native[" + name + "]']");
			var val = checkboxes_checked.val();
			model.set({
				value: val
			});
			dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
			dfd_header_b.Helper.saveChanges();

		}
	};
	dfd_header_b.View.Input.text = {
		init: function(setting){
			var $this = this;
			var id = setting.id;
			var value = setting.value;
			var input = $("input[name='native[" + id + "]']");
			input.val(value);
			if(dfd_header_b.isInitColorPicker == false){
				input.on("change", function(){
					$this.triggerOption(id);
				});
			}
		},
		triggerOption: function(id){
			var $this = this;
			setTimeout(function(){
				var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: id});
				var input = $("input[name='native[" + id + "]']");
				var val = input.val();
				model.set({
					value: val
				});
				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
				dfd_header_b.Helper.saveChanges();
				dfd_header_b.APP.Builder.build(false);
				dfd_header_b.Helper.SetColor();

			}, 100);
		}
	};
	dfd_header_b.View.Input.telephone = {
		init: function(setting){
			var $this = this;
			var id = setting.id;
			var value = setting.value;
			var input = $("input[name='native[" + id + "]']");
			input.val(value);
			if(dfd_header_b.isInitColorPicker == false){
				input.on("change", function(){
					$this.triggerOption(id);
				});
			}
		},
		triggerOption: function(id){
			var $this = this;
			setTimeout(function(){
				var model = dfd_header_b.APP.globalSettingCollection.findWhere({id: id});
				var input = $("input[name='native[" + id + "]']");
				var val = input.val();
				model.set({
					value: val
				});
				dfd_header_b.Config.setGlobalSetting(dfd_header_b.APP.globalSettingCollection.toJSON());
				dfd_header_b.Helper.saveChanges();
				dfd_header_b.APP.Builder.build(false);
				dfd_header_b.Helper.SetColor();

			}, 100);
		}
	};

})(jQuery);