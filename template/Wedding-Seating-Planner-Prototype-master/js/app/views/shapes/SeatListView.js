define(["./SeatView", "libs/Backbone.Framework"], 

function(SeatView) {
    
	var SeatListView = Backbone.View.extend({
		
		initialize: function(attrs) {

			_.bindAll(this, 'getContext', 'draw', 'makeViews', 'makeView', 'removeView')
			this.style = attrs.style;

			this.views = {};		
			this.viewPool = {};

			this.model.bind('reset', this.makeViews);
			this.model.bind('add', this.makeView);
			this.model.bind('remove', this.removeView);

			this.makeViews();

		},

		makeViews: function () {

			var ctx = this.getContext();

			if(ctx) {			
				var seats = this.model;
				seats.forEach( this.makeView, this);
				_(this.views).each(this.addToPool, this);
			}
		},

		makeView: function (seat) {
			var cid = seat.cid;

			if ( this.views.hasOwnProperty(cid) ) {

				if ( this.views[cid].model != seat ) {


					this.views[cid].setModel(seat);					

				} else {

				}					

			} else if (this.viewPool.hasOwnProperty(cid)) {

				if ( this.viewPool[cid].model == seat ) {


					this.views[cid] = this.viewPool[cid];
					delete this.viewPool[cid];

				} else {

					this.viewPool[cid].setModel(seat); 
					this.views[cid] = this.viewPool[cid];
					delete this.viewPool[cid];
				}

			} else {


				this.views[cid] = new SeatView({ model: seat, el: this.el, style: this.style });

			}
		},


		getContext: function () {

			var ctx;

			if( $(this.el) && $(this.el).get(0) )	{
				var canvas = $(this.el).get(0);

				canvas.onselectstart = function () { return false; }
				ctx = canvas.getContext("2d");
			}		
			return ctx;	
		},

		addToPool: function (seatView, key, views) {
			var hasId = this.model.any( function (seat) {

				if (key === seat.cid) { return true; }
			});


			if ( hasId ) {
				return true;
			} else {
				delete views[key];
				this.viewPool[key] = seatView;
				return false;
			}
		},

		draw : function ( ctx ) {



			var ctx = this.getContext();

			if(ctx) {

				_(this.views).each ( function (view) {
					// TODO: Only render when changed, see above clearrect as well
					view.draw();
					
				}, this);


			}
		},

		removeView: function (seat) {
			var cid = seat.cid;

			if ( this.views.hasOwnProperty(cid) && this.views[cid].model == seat) {

				this.viewPool[cid] = this.views[cid];
				delete this.views[cid];

			} 
		}
		
	});
	
	return SeatListView;
	
});