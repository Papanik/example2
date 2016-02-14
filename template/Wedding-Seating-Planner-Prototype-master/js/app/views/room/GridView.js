define(["app/views/base/BaseCanvasView", "libs/Backbone.Framework"], 

function(BaseCanvasView) {
    
	var GridView = BaseCanvasView.extend({
		
		initialize: function (attrs) {
			_.bindAll(this, 'render', 'draw', 'getContext');
			this.views = [];
			this.style = attrs.style || new Style();
			if (this.model) this.setModel(this.model);		
		},

		setModel: function (model) {
			var model = this.model = model,
			shape = model.get('shape');

			model.bind('change:scaleX', this.render);
			model.bind('change:scaleY', this.render);		
			model.bind('change:footprintWidth', this.render);
			model.bind('change:footprintHeight', this.render);
			model.bind('change:colWidth', this.draw);
			model.bind('change:rowHeight', this.draw);

			model.bind('remove', this.removeCanvas);

			shape.bind('change:rotation', this.draw);

		},

		render : function () {

			var json = this.model.toJSON();

			$(this.el).attr({ width: json.footprintWidth, height: json.footprintHeight });
			this.draw();	

			return this;
		},

		draw: function () {

			var units = this.model.get('shape').get('units'),
				ctx = this.getContext(),
				m = this.model.toJSON(),
				sX = m.x + 0.5,
				sY = m.y + 0.5,
				fX = m.footprintWidth,
				fY = m.footprintHeight,
				ew = 
				colW = m.colWidth,
				rowH = m.rowHeight;

			ctx.clearRect(0, 0, fX, fY);
			ctx.beginPath();

			for (var x = sX; x <= fX; x += colW) {			  	
				ctx.moveTo(x, 0);
			  	ctx.lineTo(x, fY);
			}

			for (var x = sX - colW; x >= 0; x-= colW) {
				ctx.moveTo(x, 0);
			  	ctx.lineTo(x, fY);
			}

			for (var y = sY; y <= fY; y += rowH) {
			  	ctx.moveTo(0, y);
			  	ctx.lineTo(fX, y);
			}

			for (var y = sY - rowH; y >= 0; y-= rowH) {
				ctx.moveTo(0, y);
			  	ctx.lineTo(fX, y);
			}
			ctx.closePath();
			ctx.strokeStyle = this.style.get('strokeStyle');
			ctx.stroke();
			
			this.drawSubViews();
		}
		
	});
	
	return GridView;
	
});