var Password = {

	initForm: function(){

		var self = this;

		self.$form = $('#form');

		$('#submit').click(function(e){
			e.preventDefault();
			self.sendForm();

		});
	},

	sendForm: function(){

		var self = this;

		blockUI();
		
		$.ajax({
		
			url: window.location,
			data: self.$form.serialize(),
			type: 'POST',
			dataType: 'json'
		
		}).complete(function(reply){

            var reply = reply.responseJSON;
            
            if(reply.status == 0)
            {
                unblockUI();
                alert(reply.message);
            }
            else
            {
                window.location = self.moduleUrl;
            }
		})
	}
};