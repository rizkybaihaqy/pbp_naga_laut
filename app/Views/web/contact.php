    <body>
        <nav id="navbarMain" class="navbar navbar-dark navbar-expand-md py-0 fixed-top bg-black">
            <a href="<?php echo base_url('web/view/index'); ?>" class="navbar-brand">Punk From The West <i class="fas fa-fist-raised"></i></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navLinks">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo base_url('web/view/galeri'); ?>" class="nav-link">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('web/view/about'); ?>" class="nav-link">About</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url('web/view/contact'); ?>" class="nav-link">Contact Me</a>
                    </li>
                </ul>
            </div>
        </nav>

        <section id="formContactContent">
            <div class="container my-5 text-light">
                <div class="row justify-content-end mr-5">
                    <div class="lead">Follow me on instagram <i class="fab fa-instagram"></i> @rizkybaihaqy</div>
                </div>
                <div class="row mt-5 text-light justify-content-md-between">
                    <div class="col-md-2 col-lg-4 d-none d-md-block align-self-center">
                        <p><i class="fas fa-envelope-open"></i></p>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <form name="formContact" method="POST" autocomplete="on" action="" onsubmit="validateForm();">
                            <label for="name">Name</label> 
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus/>
                            
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="something@yourmail.thedomain" autofocus>
                    
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" autofocus>
                    
                            <label for="message">Your Message</label>
                            <textarea type="text" class="form-control" id="message" name="message"></textarea>
                            <br>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-light">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>