@extends('crudbooster::admin_template')
@section('content')
<style>
   
    .card {
        border: none;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .card-body p{
        font-family: 'Poppins', sans-serif;
    }

    .container-fluid div span {
        border: 1px solid black;
        padding: 50px;
        border-radius: 10px;
    }

    p {
        font-size: 15px;
    }

    .cancel-btn {
        background-color: transparent;
        color: #6c757d;
        border-color: #6c757d;
    }

    .cancel-btn:hover {
        color: #343a40;
        background-color: #e9ecef;
    }

    .submit-btn {
        background-color: #007bff;
        border-color: #007bff;
    }

    .submit-btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-5">Terms and Condition</h1>
                    <p>Thanks for using our products and services (“Services”). The Services are provided by Digits
                        Trading Corporation.</p>
                    <p><b>By using our Services, you are agreeing to these terms. Please read them carefully.</b>
                    </p>
                    <p class="text-justify">Our services are very diverse, so sometimes additional terms or product
                        requirements may
                        apply. Additional terms will be available with the relevant services and documents, and
                        those additional terms become part of your agreement with us if you use these services.</p>
                    <h2>Using our Services</h2>
                    <p class="text-justify">You must follow any policies made available to you within the Services.
                        Don’t misuse our
                        Services. For example, don’t interfere with our Services or try to access them using a
                        method other than the interface and the instructions that we provide. You may use our
                        services only as permitted by law, including applicable export and re-export control laws
                        and regulations. We may suspend or stop providing our services to you if you do not comply
                        with our terms or policies or if we are investigating suspected misconduct.</p>
                    <p class="text-justify">Using our Services does not give you ownership of any intellectual
                        property rights in our
                        services or the content you access. You may not use content from our services unless you
                        obtain permission from its owner or are otherwise permitted by Digits’ policies and
                        procedures.</p>
                    <p class="text-justify">In connection with your use of the services, we may send you service
                        announcements,
                        administrative messages, and other information. Please read and understand them carefully,
                        as these are policies and procedures set by the company.</p>
                    <h2>Your Account</h2>
                    <p class="text-justify">To protect your personal account, keep your password confidential. You
                        are responsible for
                        the activity that happens on or through your account. Please ensure that all default
                        passwords provided by the company are changed once you receive your account information.</p>
                    <h2>Modifying and Terminating our Services</h2>
                    <p class="text-justify">We are constantly changing and improving our Services. We may add or
                        remove functionalities
                        or features, and we may suspend or stop a Service altogether. If we discontinue a Service,
                        where reasonably possible, we will give you reasonable advance notice and a chance to get
                        information out of that Service.</p>
                    <h2>Proper uses of our Services</h2>
                    <p>Our services must be used properly and in accordance with Digits’ policies and procedures.
                    </p>
                    <p class="text-justify">Please refrain from performing any test transactions using our official
                        servers. A proper
                        test server will be provided as an avenue for users to perform tests, practice transactions,
                        and teach colleagues on the usage of our services.</p>
                    <h2>Business uses of our Services</h2>
                    <p class="text-justify">If you are using our services on behalf of a business, that business
                        accepts these terms. It
                        will hold harmless and indemnify Digits and its affiliates, officers, agents, and employees
                        from any claim, suit or action arising from or related to the use of the services or
                        violation of these terms, including any liability or expense arising from claims, losses,
                        damages, suits, judgments, litigation costs and attorneys’ fees.</p>
                    <h2>About these Terms</h2>
                    <p class="text-justify">We may modify these terms or any additional terms that apply to a
                        service to, for example,
                        reflect changes to the policies, procedures, or changes to our services. You should look at
                        the terms regularly.</p>
                    <p class="text-justify">If there is a conflict between these terms and the additional terms, the
                        additional terms
                        will control for that conflict.</p>
                    <p class="text-justify">If you do not comply with these terms, and we don't take action right
                        away, this doesn't mean
                        that we are giving up any rights that we may have (such as taking action in the future).</p>
                    <p>If it turns out that a particular term is not enforceable, this will not affect any other
                        terms.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

