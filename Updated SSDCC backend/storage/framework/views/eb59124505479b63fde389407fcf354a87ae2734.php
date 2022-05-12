

<style>
    img {
        max-width: 100%;
    }

    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%;
        border-right: 1px solid #c4c4c4;
    }

    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }

    .top_spac {
        margin: 20px 0 0;
    }


    .recent_heading {
        float: left;
        width: 40%;
    }

    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
    }

    .headind_srch {
        padding: 10px 29px 10px 20px;
        overflow: hidden;
        border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }

    .srch_bar input {
        border: 1px solid #cdcdcd;
        border-width: 0 0 1px 0;
        width: 80%;
        padding: 2px 0 4px 6px;
        background: none;
    }

    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }

    .srch_bar .input-group-addon {
        margin: 0 0 0 -27px;
    }

    .chat_ib h5 {
        font-size: 15px;
        color: #464646;
        margin: 0 0 8px 0;
    }

    .chat_ib h5 span {
        font-size: 13px;
        float: right;
    }

    .chat_ib p {
        font-size: 14px;
        color: #989898;
        margin: auto
    }

    .chat_img {
        float: left;
        width: 11%;
    }

    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people {
        overflow: hidden;
        clear: both;
    }

    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }

    .inbox_chat {
        height: 550px;
        overflow-y: scroll;
    }

    .active_chat {
        background: #ebebeb;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }

    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }

    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .received_withd_msg {
        width: 100%;
    }

    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0;
        color: #fff;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .outgoing_msg {
        overflow: hidden;
        margin: 26px 0 26px;
    }

    .sent_msg {
        float: right;
        width: 100%;
    }

    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }

    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }

    .messaging {
        padding: 0 0 50px 0;
    }

    .msg_history {
        height: 516px;
        overflow-y: auto;
    }
</style>

 <div class="modal-header">
    <h5 class="modal-title">Lead Message </h5>
    <button type="button" class="close" data-dismiss="modal">×</button>
 </div>

 <div class="modal-body pt-4">
    <div id="formErrors"></div>
    

     <!-- Alert message (start) -->
        <?php if(Session::has('message')): ?>
        <div class="alert <?php echo e(Session::get('alert-class')); ?>">
            <?php echo e(Session::get('message')); ?>

        </div>
        <?php endif; ?>
        <!-- Alert message (end) -->
      <form class="form" id="leadMessage" action="javascript:void(0)" method="post">
         <?php echo csrf_field(); ?>
        <input type="hidden" name="lead_id" value="<?php echo e(@$data['leadInfo']['lead_id']); ?>">
        <div class="type_msg">
            <div class="input_msg_write">
                <input type="text" class="write_msg" name="lead_message" required placeholder="Type a message" />
               <button type="submit" class="btn btn-sm btn-rounded btn-success">Submit</button>
                 <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>  
     <div class="messaging">
                    <div class="inbox_msg">

                        <div class="mesgs">
                            <div class="msg_history">
                                <?php $__currentLoopData = $data['ldMessage']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                <?php if($leadMessage->sender_id==$leadMessage->service_user_id): ?>
                                <div class="outgoing_msg"><div class="incoming_msg_img"><?php echo e($leadMessage->receiver); ?><span class="time_date"> <?php echo e(date('d-m-Y | H:i:s A', strtotime($leadMessage->created_at))); ?></span></div>
                                    <div class="sent_msg">
                                        <p><?php echo e($leadMessage->message); ?></p>
                                        
                                    </div>
                                </div>
                                <?php else: ?>:
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <?php echo e($leadMessage->sender); ?> <span class="time_date"> <?php echo e(date('d-m-Y | H:i:s A', strtotime($leadMessage->created_at))); ?></span></div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p><?php echo e($leadMessage->message); ?></p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            

                        </div>
                    </div>



 </div>

 
<?php /**PATH /var/www/html/agent/resources/views/lead/message.blade.php ENDPATH**/ ?>