<?php
class Payment_model extends CI_Model {
 
  function getpaymentData($user_id, $user_type, $payment_type, $key){
    if($key == md5('userid_'.$user_id)){
      $this->db->where('user_id', $user_id);
      $this->db->where('user_type', $user_type);
      $this->db->where('payment_type', $payment_type);
      $payment_query = $this->db->get('athletesmarketplace_payment');
      if($payment_type == "creditcard"){
        if($payment_query->num_rows() > 0) {      
          $cc_number = ''; $cc_exp = ''; $cc_cvv = ''; $cc_name = '';
          foreach($payment_query->result() as $row) {
                if($row->payment_field == 'cc_number'){
                  $cc_number = $row->payment_value;
                }
                if($row->payment_field == 'cc_exp'){
                  $cc_exp = $row->payment_value;
                }
                if($row->payment_field == 'cc_cvv'){
                  $cc_cvv = $row->payment_value;
                }
                if($row->payment_field == 'cc_name'){
                  $cc_name = $row->payment_value;
                }
            }
            $paymentData = array(
                              'cc_number' => $cc_number,
                              'cc_exp' => $cc_exp,
                              'cc_cvv' => $cc_cvv,
                              'cc_name' => $cc_name
                            );
            return $paymentData;
        } else {
            $paymentData = array(
                              'cc_number' => '',
                              'cc_exp' => '',
                              'cc_cvv' => '',
                              'cc_name' => ''
                            );
            return $paymentData;
        }
      } else if($payment_type == "paypal"){
        if($payment_query->num_rows() > 0) {      
          $paypal_name = ''; $paypal_email = ''; 
          foreach($payment_query->result() as $row) {
                if($row->payment_field == 'paypal_name'){
                  $paypal_name = $row->payment_value;
                }
                if($row->payment_field == 'paypal_email'){
                  $paypal_email = $row->payment_value;
                }
            }
            $paymentData = array(
                              'paypal_name' => $paypal_name,
                              'paypal_email' => $paypal_email
                            );
            return $paymentData;
        } else {
            $paymentData = array(
                              'paypal_name' => '',
                              'paypal_email' => ''
                            );
            return $paymentData;
        }
      }
    } 
  }

  function updatepaymentData($user_id, $user_type, $payment_type, $payment_field, $payment_value, $key){
    if($key == md5('userid_'.$user_id)){
      $this->db->where('user_id', $user_id);
      $this->db->where('user_type', $user_type);
      $this->db->where('payment_type', $payment_type);
      $this->db->where('payment_field', $payment_field);
      $query = $this->db->get('athletesmarketplace_payment');
      if($query->num_rows() > 0) {
        $ccData = array('payment_value' => $payment_value);
        $this->db->where('user_id', $user_id);
        $this->db->where('user_type', $user_type);
        $this->db->where('payment_type', $payment_type);
        $this->db->where('payment_field', $payment_field);
        return $this->db->update('athletesmarketplace_payment', $ccData);
      } else {
        $ccData = array(
                    'user_id' => $user_id,
                    'user_type' => $user_type,
                    'payment_type' => $payment_type,
                    'payment_field' => $payment_field,
                    'payment_value' => $payment_value
                    );
        return $this->db->insert('athletesmarketplace_payment', $ccData);
      }
    }
  }

}

?>
