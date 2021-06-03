<div class="mb-5" id="cta-danger" style="display: none">
    <div class="cta-yellow px-5 py-1 cta-border-bottom cta-border">
        <div class="row d-flex align-items-center">
            <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                <i class='bx bxs-shield-x bx-md mr-3 text-black'></i>
                <p class="mb-0 text-black">{{$message}}</p>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                <a onclick="showCTAForm()"  data-toggle="collapse" href="#CTAForm" role="button" aria-expanded="false" aria-controls="CTAForm" type="button" class="btn btn-cta" name="button">Contact Marketing</a>
            </div>
        </div>
    </div>
    <div class="cta-white px-5 collapse" id="CTAForm">
        <form class="py-5" action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Message</label>
                        <input id="message" type="text" name="message" value="" class="form-control" placeholder="Fill Your Problem">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <button onclick="showCTAForm()" data-toggle="collapse" href="#CTAForm" role="button" aria-expanded="false" aria-controls="CTAForm" type="button" class="btn btn-cancel-cta" name="button">Cancel</button>
                <button type="button" onclick="mailToMarketing()" class="btn btn-send-cta ml-2" name="button">Send</button>
            </div>
        </form>
    </div>
</div>
<div id="notif-form-success" class="alert alert-custom fade show cta-grey px-5 py-3 cta-border-bottom mb-5" role="alert" style="display: none">
    <div class="alert-text">
        <div class="d-flex align-items-center">
            <i class='bx bxs-check-circle bx-md mr-3 text-black'></i>
            <p class="mb-0 text-black">Your message has been sent.</p>
        </div>
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close icon-alert-close text-black"></i></span>
        </button>
    </div>
</div>
