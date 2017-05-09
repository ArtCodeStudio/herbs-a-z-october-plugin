<?php
error_reporting(E_ALL);
Route::post('/send-mail', function () {

     
        $formVars = [
            'receivermail' => 'hallo@krautermichel.de',//post('receivermail'), {{this.theme.email_address}}
            'receivername' => post('receivername'),
            'contact_success_text' => post('contact_success_text'),
            'contact_regard' => post('contact_regard'),
            'mailtemplate' => 'kontakt-krautermichel',//post('mailtemplate'),
            'name' => post('name'),
            'email' => post('email'),
            'regard' => post('regard'),
            'sendermessage' => post('message'),
            'email_subject' =>  post('email_subject'),
        ];
       
     //print_r( $formVars); die;
        
        // $formVars['receiverregard'] = str_replace("{{name}}", $formVars['name'], $formVars['receiverregard']);
        // $formVars['receiverregard'] = str_replace("{{regard}}", $formVars['regard'], $formVars['receiverregard']);
        
        $buildOwnerMessage = function ($message) use ($formVars) {
            // TODO use email and name from backend or theme settings
            $message->to($formVars['receivermail'], $formVars['receivername']);
            $message->subject($formVars['email_subject']);
        };

        // mail to site owner
        Mail::send('kontakt-krautermichel', $formVars, $buildOwnerMessage);
        
       // $this['result'] = $formVars['succeesstext'];

       return "OK"; //$formVars;
});


Route::get('/send-mail', function () {
    echo '
    <form class="contactForm" role="form" method="POST" action="/send-mail">
    <div class="form-groups">
        <input type="hidden" name="contact_success_text" value="success text "/>
        <div class="form-group">
            <input type="text" class="form-control" value="test" name="name" _required placeholder="Name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control"  value="a@b.net" name="email" _required placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="regard" _required placeholder="Regard">
        </div>
        <fieldset class="form-group">
            <textarea class="form-control" name="message" rows="6" _required placeholder="Your message to us"></textarea>
        </fieldset>
        <div class="d-flex align-items-end flex-column">
            <button type="submit" class="btn">Send</button>
        </div> 
    </div>
</form>
    
    
    ';
});