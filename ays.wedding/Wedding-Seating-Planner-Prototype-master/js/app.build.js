({
    appDir: "../",
    baseUrl: "js/",
    dir: "../../WebSites/Archant.Weding/Content/SeatingPlanner",
    //Comment out the optimize line if you want
    //the code minified by UglifyJS
    optimize: "none",

    modules: [

        //Optimize the application files. 
		{
			name: "libs/Backbone.Framework"
		},
        {
            name: "main",
			exclude: ["libs/Backbone.Framework"]
        }
    ]
})
