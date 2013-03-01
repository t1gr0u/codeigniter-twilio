codeigniter-twilio
==================

twilio library for codeigniter

I wanted to use the new twilio library in codeigniter but couldn't find it. So I built it.

## Demo
Demo controller in 'controllers' folder

## Install
Copy the files into the appropriate folders apart from the controller unless you want to try it.

Then you need to add you *account_sid* and *auth_token* in the config file.

Call the library in your code:

`$this->load->library( 'twilio_services' );`

Now you can call any Twilio API ([Api Doc](https://www.twilio.com/docs/api/rest))

`$call = $this->twilio_services->account->calls->get("CA42ed11f93dc08b952027ffbc406d0868");
print $call->to;`


## Info
I'm using the new Twilio library which can be found here: [https://github.com/twilio/twilio-php](https://github.com/twilio/twilio-php)

