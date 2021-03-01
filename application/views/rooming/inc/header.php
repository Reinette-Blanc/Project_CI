    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" id="Home" href="<?php echo base_url() ?>">ROOMING</a>
                <?php if ($this->session->userdata('ss_user_id') == '') { ?>
                    <form class="d-flex" id="login" action="<? echo base_url("User/login")?>">
                        <button class="btn" id="title" type="submit">Login</button>
                    </form>
                <?php } else { ?>

                    <ul class="nav justify-content-end">
                        
                        <span id="fullname"><?php echo $this->session->userdata('ss_user_fullname'); ?></span>
          
                        <form class="d-flex" id="login" action="<? echo base_url("User/logout")?>">
                            <button class="btn" id="title" type="submit">Logout</button>
                        </form>
                    <?php } ?>
            </div>
            </div>
        </nav>
    </header>

    <style type="text/css">
        header {
            display: flex;
            flex-direction: column;
            font-family: -system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        #Home {
            margin-left: 18px;
            font-size: 24px;
        }

        #fullname {
            font-size: 18px;
            padding: 5px;
            margin-right: 10px;
            color: white;
        }

        #title {
            background-color: #FFA726;
            color: white;
            font-size: 18px;
            padding: 5px 16px;
            margin-right: 10px;
        }
    </style>