<?php
	class bangla_converter {
	    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর", "ঢাকা", "চট্টগ্রাম", "রাজশাহী", "বরিশাল", "সিলেট", "ময়মনসিংহ", "রংপুর", "খুলনা");

	    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "dhaka", "chittagong", "rajshahi", "barishal", "sylhet", "mymensingh", "rangpur", "khulna");
	    
	    public static function bn2en($number) {
	        return str_replace(self::$bn, self::$en, $number);
	    }
	    
	    public static function en2bn($number) {
	        return str_replace(self::$en, self::$bn, $number);
	    }
	}
?>
