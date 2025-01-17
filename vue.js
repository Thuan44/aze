// Components ==========
// Homepage
const Home = {
    template: `
        <div>
        
        <div class="container-fluid mt-5">
        
            <div id="carouselExampleIndicators" class="carousel slide px-5 mx-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> 
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/carousel_img_1_compressed.jpg" class="d-block w-100" alt="image carousel 1">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/carousel_img_2_compressed.jpg" class="d-block w-100" alt="image carousel 2">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/carousel_img_3_compressed.jpg" class="d-block w-100" alt="image carousel 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
            <h1 class="mt-5 text-center tous-nos-produits h1-home" style="font-family: 'Fjalla One', sans-serif;">Tous nos produits</h1>
            <p class="text-center">Le street wear nantais mixte, éthique et Made in France</p>
            <div class="divider"></div>

            <div class="centering-container">

                <aside class="filter-sidebar d-inline-block shadow-sm">
                    <div class="card">

                        <!-- Searchbar -->
                        <article class="card-group-item">
                            <header class="card-header">
                                <h6 class="title m-0">RECHERCHER</h6>
                            </header>
                            <div class="filter-content">
                                <div class="card-body">
                                            <label for="searchbar" class="visuallyhidden position-absolute"></label>
                                            <input type="search" class="form-control border w-100" id="searchbar" placeholder="Rechercher un produit" v-model="searchTerm">
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->

                        <!-- Category filter -->
                        <article class="card-group-item">
                            <header class="card-header">
                                <h6 class="title m-0">Categories</h6>
                            </header>
                            <div class="filter-content">
                                <div class="card-body">
                                    <div v-for="product in allCategories">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" :id="product.category_name" :value="product.category_name" v-model="selectedCategories">
                                            <label class="custom-control-label" :for="product.category_name">{{ product.category_name }}</label>
                                        </div> <!-- form-check.// -->
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->
                        
                    </div> <!-- card.// -->
                </aside>

                <div v-if=" selectedCategories.length > 0 || searchTerm !== '' " class="d-inline-block product-container">
                    <div class="d-flex justify-content-center cards-container flex-wrap">
                        <div v-for="product in filteredProducts" v-bind:key="product.product_id" class="mt-4">
                            <div class="col-4">
                                <div class="card product-card shadow-sm p-3" style="width: 20rem;">
                                    <img class="card-img-top" :src="getImgUrl(product.img_name)" alt="product.img_name">
                                    <p v-if="product.product_stock <= 10 && product.product_stock > 0" class="card-text stock lead text-center"><i class="fas fa-exclamation-circle"></i> STOCK LIMITÉ !</p>
                                    <p v-if="product.product_stock == 0" class="card-text stock lead text-center text-danger"><i class="fas fa-sad-tear"></i> STOCK ÉPUISÉ !</p>
                                    <div class="card-body d-flex flex-column -justify-content-center">
                                        <h5 class="card-title mb-1" style="font-family: 'Tajawal', sans-serif;">{{ product.product_name }}</h5>
                                        <p class="card-text mb-3">{{ product.category_name }}</p>
                                        <h4 class="product-price">{{ product.product_price }}€</h4>
                                        <div class="d-flex justify-content-center">
                                            <router-link :to="{name: 'ProductSheet', params: { id: product.product_id }}" class="btn btn-dark btn-card text-capitalize mr-2"><i class="far fa-eye"></i></router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="d-inline-block product-container">
                    <div class="d-flex justify-content-center cards-container flex-wrap">
                        <div v-for="product in allProducts" v-bind:key="product.product_id" class="mt-4">
                            <div class="col-4">
                                <div class="card product-card shadow-sm p-3" style="width: 20rem;">
                                    <img class="card-img-top" :src="getImgUrl(product.img_name)" alt="product.img_name">
                                    <p v-if="product.product_stock <= 10 && product.product_stock > 0" class="card-text stock lead text-center"><i class="fas fa-exclamation-circle"></i> STOCK LIMITÉ !</p>
                                    <p v-if="product.product_stock == 0" class="card-text stock lead text-center text-danger"><i class="fas fa-sad-tear"></i> STOCK ÉPUISÉ !</p>
                                    <div class="card-body d-flex flex-column -justify-content-center">
                                        <h5 class="card-title mb-1" style="font-family: 'Tajawal', sans-serif;">{{ product.product_name }}</h5>
                                        <p class="card-text mb-3">{{ product.category_name }}</p>
                                        <h4 class="product-price">{{ product.product_price }}€</h4>
                                        <div class="d-flex justify-content-center">
                                            <router-link :to="{name: 'ProductSheet', params: { id: product.product_id }}" class="btn btn-dark btn-card text-capitalize mr-2"><i class="far fa-eye"></i></router-link>
                                        </div>
                                    </div>
                                </div> <!-- card.// -->
                            </div> <!-- col.// -->
                        </div> <!-- v-for.// -->
                    </div> 
                </div> <!-- v-else.// -->

            </div> <!-- centering-container.// -->

        </div> <!-- container-fluid.// -->
        
    </div>
    `,
    name: 'Home',
    data: () => {
        return {
            selectedCategories: [],
            allProducts: '',
            allCategories: '',
            searchTerm: '',
        }
    },
    computed: {
        filteredProducts() {
            let filteredProducts;

            // Filter by name
            if (this.searchTerm !== '') {
                return filteredProducts = this.allProducts.filter((product) => {
                    return product.product_name.toLowerCase().includes(this.searchTerm.toLowerCase());
                })
            }

            // Filter by category
            if (this.selectedCategories.length) {
                filteredProducts = this.allProducts.filter(product => this.selectedCategories.includes(product.category_name));
            }

            return filteredProducts;
        },
    },
    methods: {
        getImgUrl(picture) {
            return "assets/" + picture;
        },
        addToCart(productId) {
            axios
                .post('admin/action.php', {
                    action: 'addsingleproducttocart',
                    productId: productId,
                })
                .then(response => alert(response.data.message))
        },
        // Get all products from database
        fetchAllProducts() {
            axios
                .post('admin/action.php', {
                    action: 'fetchallproducts'
                }).then(response => (this.allProducts = response.data))
        },
        // Get all categories from database
        fetchAllCategories() {
            axios
                .post('admin/action.php', {
                    action: 'fetchallcategories'
                }).then(response => (this.allCategories = response.data))
        },
    },
    created() {
        // Call fetchAll functions
        this.fetchAllProducts();
        this.fetchAllCategories();
    },
}


const About = {
    template: `
        <div>

            <div class="container">
                <div class="row">

                    <div class="col-6 col-xl-6">
                        <div class="about-background">
                            <img src="assets/img/about_us_background_compressed.jpg" alt="about us picture">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <h1 class="mt-5 text-center cart-title h1-front h1-about" style="font-family: 'Fjalla One', sans-serif;">Histoire d'Aze</h1>
                        <p class="text-center" style="color: #777">Valoriser la beauté, non pas du corps mais des corps, loin des stéréotypes classiques véhiculés par le milieu de la mode d’aujourd’hui</p>
                        <div class="divider"></div>
                        <p class="text-justify">
                            Créative, j'ai eu envie très jeune d'évoluer dans le milieu artistique. C'est en 2006 que j'ai commencé mes études de stylisme modélisme à « ESMOD », que j'ai par la suite complété par un Cap métier de la mode et du vêtement flou et un double certificat professionnel en stylisme et modélisme en prêt à porter femme. <br><br>
                            
                            Travailler dans le domaine de la couture, en acquérir les techniques et les subtilités c'était pour moi perpétuer la tradition d'un savoir faire artisanal, ancestral et culturel. Du dessin au vêtement fini, mes études m’ont permises de maîtriser toutes les étapes de la création d'un vêtement et plus largement d'une collection. <br><br>
                            En 2013 j'ai intégré l'association  « Des femmes en fil », atelier d'insertion des femmes par la couture, au poste d'assistante dans lequel j’ai gravi les échelons jusqu’à prendre la gestion en 2015 pour devenir à mon tour chef d’atelier et chef modéliste. Retouches, sur mesure, costumes, création pour les stylistes nantais, les 3 années passées au sein de l’association m'ont ouverte à tous les domaines d'application de la couture et du stylisme. <br><br>

                            <div class="last-para text-justify">
                                Passionnée, avec l'envie sans cesse de me lancer dans de nouveaux projets, j'ai en parallèle organisé différents défilés de lingerie ou de prêt à porter, notamment pour la nuit du Van à « la cale 2 créateurs » de 2012 à 2016 ou encore pour l'événement « Brésil pluriel », avec toujours comme fil de trame, la volonté d’en faire de véritables spectacles mélangeant art visuel et spectacle vivant.
                            </div>
                        </p>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 text-justify">
                        <p class="text-justify">
                            <div class="last-para-hidden text-justify d-none">
                                Passionnée, avec l'envie sans cesse de me lancer dans de nouveaux projets, j'ai en parallèle organisé différents défilés de lingerie ou de prêt à porter, notamment pour la nuit du Van à « la cale 2 créateurs » de 2012 à 2016 ou encore pour l'événement « Brésil pluriel », avec toujours comme fil de trame, la volonté d’en faire de véritables spectacles mélangeant art visuel et spectacle vivant.
                            </div> <br><br>

                            En 2017 je m'installe aux ateliers partagés du Mékano pour créer mon atelier où je réalise des créations sur mesure, des vêtements de cérémonie, des costumes et où je crée AZE, ma marque de vêtements et accessoires streetwear éthique et mixte pour laquelle j'utilise autant que possible des cotons issus de l'agriculture biologique et des tissus récupérés dans une démarche de recyclage. <br><br>

                            A travers cette marque et dans la continuité des défilés organisés au cours de ces dernières années, je tiens à valoriser la beauté, non pas du corps mais des corps, loin des stéréotypes classiques véhiculés par le milieu de la mode encore aujourd'hui. J'ai à cœur de faire défiler des hommes et des femmes de tout âges et de toutes origines ethniques et sociales promouvant ainsi une mixité à laquelle je crois. Je crois également au travail collectif, à l'échange de savoir entre les différentes cultures et à la valorisation par l'apprentissage. Ainsi je développe en parallèle depuis 1 an des cours de couture pour l’association « Papiers ciseaux » à Rezé et à  l'amicale laïque du Coudray au sein desquelles je m'efforce à la fois de créer une dynamique de groupe et de transmettre mon savoir-faire en accompagnant des personnes de tous niveaux dans leurs projets afin qu'elles prennent d'avantage confiance en elles.
                        </p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-lg-4 mb-4">
                        <router-link to="/" class="btn btn-outline-primary w-100 shadow-sm">Explorer la boutique</router-link>
                    </div>
                    <div class="col-6 col-lg-4 mb-2">
                        <a href="#" class="btn btn-outline-primary w-100 shadow-sm">Évènements</a>
                    </div>
                    <div class="col-6 col-lg-4 mb-2">
                        <a href="#" class="btn btn-outline-primary w-100 shadow-sm">Blog</a>
                    </div>
                </div>

            </div>
        
        </div>
    `,
    name: 'About',
    data: () => {
        return {
        }
    },
}


// Product Sheet
const ProductSheet = {
    template: `
        <div>

            <div class="container product-sheet-container mt-5 py-5 px-4 bg-white shadow-sm rounded">

                <div class="row justify-content-center">

                    <!-- PRODUCT IMAGES -->
                    <div class="col-md-1 col-lg-1 px-0 align-self-center extra-images" align="center">
                        <div v-if="relatedImg.extra_img1 != '' " class="product-extra-img mb-2 border">
                            <img :src="getExtraImgUrl(relatedImg.extra_img1)" alt="extra-product-image">
                        </div>
                        <div class="product-extra-img mb-2 border">
                            <img :src="getImgUrl(relatedImg.img_name)" alt="extra-product-image2">
                        </div>
                        <div class="product-extra-img mb-2 border">
                            <img :src="getImgUrl(relatedImg.img_name)" alt="extra-product-image3">
                        </div>
                        <div class="product-extra-img mb-2 border">
                            <img :src="getImgUrl(relatedImg.img_name)" alt="extra-product-image4">
                        </div>
                    </div> <!-- col.// -->

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pr-4 align-self-center">
                        <div class="product-img">
                            <img :src="getImgUrl(relatedImg.img_name)" alt="image principale">
                            <p class="font-italic text-center mb-4" style="color: rgba(50, 50, 50, .4)">Passez sur les miniatures les agrandir</p>
                        </div>
                    </div> <!-- col.// -->

                    <!-- PRODUCT INFO -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 px-4">
                        <h4 class="product-title" >{{ product.product_name }}</h4>
                        <div class="badge badge-pill badge-primary pb-1">{{ product.brand_name }}</div>
                        <small class="text-uppercase product-availability d-block">Disponibilité: 
                            <span v-if="product.product_stock == 0" class="text-danger"><u>Rupture de stock</u></span>
                            <span v-else-if="product.product_stock < 10" class="text-warning"><u>Stock limité</u></span>
                            <span v-else class="text-success"><u>En stock</u></span>
                        </small>
                        <div class="single-product-price text-danger">{{ product.product_price }}€</div>
                        <div class="product-divider"></div>
                        <div class="d-flex flex-column justify-content-between h-75 group-description-price">
                            <div class="product-description">
                                <h5 class="text-lowercase"><span class="text-capitalize">À</span> propos de ce produit</h5>
                                <p class="text-justify">{{ product.product_description }}</p>
                                <div class="mx-4 mt-3 p-1 text-center contact-us">
                                    <small class="text-white">Vous avez une question concernant cet article ? <router-link class="text-white" to="/contact"><u>Contactez-nous ici.</u></router-link></small>
                                </div>
                                <small class="mt-3 float-right"><a href="#">Voir mes préférences de livraison \> </a></small>
                            </div>
                            <div>
                                <div class="product-divider"></div>
                                <div class="product-validation">
                                    <button :disabled="product.product_stock == 0" @click="addToCart(); showToast()" type="submit" class="btn btn-outline-success btn-sm shadow-sm w-100" id="add-to-cart">Ajouter au panier</button></td>
                                </div>
                            </div>
                        </div>
                    </div> <!-- col.// -->

                </div> <!-- row.// -->

                <!-- CUSTOMER REVIEWS -->
                <h4 class="text-left mt-5 ml-5" style="font-family: 'Fjalla One', sans-serif;">Avis clients</h4>

                <!-- ADD REVIEW -->
                <div v-if="currentUser.length == 1" class="card mx-5 my-3 rounded shadow-sm">
                    <h5 class="card-header">Laisser un avis :</h5>
                    <div class="card-body">
                        <form action="" method="POST" v-on:submit.prevent="addreview">
                            <div class="form-group">
                                <textarea class="form-control border" name="comment_content" rows="3" v-model="reviewContent" required></textarea>
                            </div>
                            <button @click="addReview(product.product_id)" type="submit" name="add-comment" class="btn btn-primary btn-sm rounded float-right">Publier</button>
                        </form>
                    </div>
                </div> <!-- card.// -->
                
                <div v-for="review in reviewsByProduct" v-bind:key="review.review_id" class="card mx-5 my-3 rounded shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 d-flex flex-column justify-content-around align-items-center">
                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid w-75" alt="avatar utilisateur" />
                                <p class="text-center"><small class="text-secondary">15 Minutes Ago</small></p>
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <h5 class="float-left text-capitalize">{{ review.user_name }}</h5>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                </p>
                                <div class="clearfix"></div>
                                <p class="text-justify">{{ review.review_content }}</p>
                                <p>
                                    <a class="float-right btn btn-primary ml-2 btn-sm rounded"> <i class="fa fa-reply"></i> Répondre</a>
                                    <a class="float-right btn text-white btn-danger btn-sm rounded"> <i class="fa fa-heart"></i> J'aime</a>
                                </p>
                            </div>  <!-- col.// -->
                        </div> <!-- row.// -->
                    </div> <!-- card-body.// -->
                </div> <!-- v-for.// -->

                <!-- TOAST -->
                <div class="toast" id="toast" style="position: fixed; top: 150px; right: 50px;" data-delay="8000">
                    <div class="toast-header bg-primary">
                        <strong class="mr-auto text-white"><i class="fas fa-smile-beam text-warning"></i> Merci !</strong>
                        <small class="text-white">À l'instant</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Votre panier a été mis à jour !
                    </div>
                </div> <!-- toast.// -->

                <div class="toast" id="toast-not-logged" style="position: fixed; top: 150px; right: 50px;" data-delay="8000">
                    <div class="toast-header bg-primary">
                        <strong class="mr-auto text-white"><i class="fas fa-surprise text-warning"></i> Oops !</strong>
                        <small class="text-white">À l'instant</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Vous devez vous connecter avant d'accéder à votre panier !
                    </div>
                </div> <!-- toast.// -->

            </div> <!-- container.// -->
            
        </div>
    `,
    name: 'ProductSheet',
    data() {
        return {
            currentUser: '',
            selectedCartId: '',
            selectedId: this.$route.params.id,
            product: '',
            relatedImg: {},
            reviewContent: '',
            reviewsByProduct: '',
        }
    },
    methods: {
        checkUser() {
            axios
                .post('./admin/action.php', {
                    action: 'checkuser'
                })
                .then(response => (this.currentUser = response.data))
        },
        getImgUrl(picture) {
            let $result = "./assets/" + picture;
            return $result;
        },
        getExtraImgUrl(picture) {
            return "./assets/extraImg/" + picture;
        },
        selectCartId() {
            axios
                .post('./admin/action.php', {
                    action: 'selectcartid',
                    productId: this.selectedId,
                })
                .then(response => (this.selectedCartId = response.data))
        },
        addToCart() {
            // Update selectedCartId
            this.selectCartId();

            if (this.selectedCartId == '') {
                // Add article to cart
                axios
                    .post('./admin/action.php', {
                        action: 'addsingleproducttocart',
                        productId: this.selectedId
                    })
                this.selectCartId();
            } else {
                // Increment product quantity
                axios
                    .post('./admin/action.php', {
                        action: 'incrementproductquantity',
                        productId: this.selectedId
                    })
            }
        },
        addReview(productId) {
            if (this.reviewContent !== '') {
                axios
                    .post('./admin/action.php', {
                        action: 'addreview',
                        productId: productId,
                        reviewContent: this.reviewContent
                    })
                    .then(response => alert(response.data.message))
            }
            this.reviewContent = ''
        },
        fetchAllReviews() {
            axios
                .post('./admin/action.php', {
                    action: 'fetchallreviews',
                    productId: this.selectedId
                })
                .then(response => (this.reviewsByProduct = response.data))
        },
        fetchSelectedProduct() {
            axios
                .post('./admin/action.php', {
                    action: 'fetchselectedproduct',
                    productId: this.selectedId
                })
                .then(response => (this.product = response.data))
        },
        fetchRelatedImg() {
            axios
                .post('./admin/action.php', {
                    action: 'fetchrelatedimg',
                    productId: this.selectedId
                })
                .then(response => (this.relatedImg = response.data))
        },
        showToast() {
            if (this.currentUser.length == 1) {
                $('#toast').toast('show');
            } else {
                $('#toast-not-logged').toast('show');
            }
        }
    },
    created() {
        this.checkUser();
        this.selectCartId();
        this.fetchAllReviews();
        this.fetchSelectedProduct();
        this.fetchRelatedImg();
    }
}


// Contact Page
const Contact = {
    template: `
    <div>

        <div class="container page-container">

            <h1 class="mt-5 text-center page-title h1-front" style="font-family: 'Fjalla One', sans-serif;">Contact</h1><p class="text-center" style="color: #777">Restons en contact !</p>
            <div class="divider"></div>

            <div class="form-container shadow-sm rounded bg-white py-4 px-5" style="max-width: 600px; margin: 0 auto">
                <form action="#" id="signup-form" method="POST" role="form">
                    <fieldset>
                        <legend class="text-center text-primary form-envelope m-0"><i class="fas fa-envelope"></i></legend>
                        <fieldset class="form-group d-flex justify-content-center my-3">
                            <div class="form-check mr-5">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                    Faire coucou
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                    Demander assistance
                                </label>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" id="firstname" placeholder="Entrez votre prénom">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Nom de famille</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Entrez votre nom de famille">
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec une tierce personne.</small>
                        </div>
                        <div class="form-group">
                            <label for="object">Objet</label>
                            <input type="text" class="form-control" id="object" placeholder="Entrez l'objet de votre message">
                        </div>
                        <div class="form-group">
                            <label for="message">Votre message</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-submit-contact rounded shadow-sm mt-2"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>

    </div>
    `,
    name: 'Contact',
}


// Cart Page
const Cart = {
    template: `
    <div>
    
        <div v-if="currentUser.length == 1 && allProductsInCart.length > 0" class="container page-container cart-container">

            <h1 class="mt-5 text-center cart-title h1-front" style="font-family: 'Fjalla One', sans-serif;">Panier</h1>
            <p class="text-center" style="color: #777">Résumé des articles sélectionnés</p>
            <div class="divider"></div>

            <table class="table table-hover cart-table shadow-sm">

                <thead>
                    <tr class="text-white text-center font-weight-bold" style="background-color: #1A1A1A !important">
                        <th scope="col"></th>
                        <th scope="col" colspan="2">Produit</th>
                        <th scope="col" class="quantity-col">Quantité</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col" class="text-right">Prix total</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr v-for="product in allProductsInCart" v-bind:key="product.cart_id" class="table-light text-center">
                        <td class="align-middle" scope="row"><button @click="deleteProduct(product, product.cart_id)" type="submit" class="btn text-danger btn-cart-delete rounded"><i class="fas fa-trash-alt"></i></button></td>
                        <td class="align-middle"><div class="cart-img"><img :src="getImgUrl(product.img_name)" alt="product.img_name" /></div></td>
                        <td class="align-middle text-left"><router-link :to="{name: 'ProductSheet', params: { id: product.product_id, product: product }}">{{ product.product_name }}</router-link></td>
                        <td class="align-middle">
                            <button @click="updateQuantity(product, 'substract', product.cart_id)" type="button" class="btn btn-outline-secondary btn-quantity"><i class="fas fa-minus"></i></button>
                            <input @change="updateQuantity(product, 'manualUpdate', product.cart_id, product.product_quantity)" type="number" min="1" step="1" v-model.number="product.product_quantity" class="input-quantity">
                            <button @click="updateQuantity(product, 'add', product.cart_id)" type="button" class="btn btn-outline-secondary btn-quantity"><i class="fas fa-plus"></i></button>
                        </td>
                        <td class="align-middle">{{ product.product_price }}€</td>
                        <td class="text-right align-middle bg-secondary" style="border-left: 1px dashed rgba(26, 26, 26, .4) !important">{{ (product.product_price * product.product_quantity).toFixed(2) }}€</td>
                    </tr>
                </tbody>

            </table>

            <form action="#" method="POST" @submit.prevent="confirmTotalToPay">
                <div class="total-group d-flex flex-column">
                    <div class="d-flex align-items-center total-to-pay form-group mb-2 shadow-sm">
                        <label for="total-to-pay" class="mb-0 total-label bg-primary text-white form-control text-uppercase text-center">Total à payer</label>
                        <input id="total-to-pay" class="text-right total-input form-control bg-light" :value="totalToPay" disabled/>
                    </div>
                    <div class="btn-checkout shadow-sm">
                        <button type="submit "class="btn btn-success form-control">
                            <span class="pl-1">Procéder au paiement <i class="fas fa-credit-card"></i></span>
                        </button>
                    </div>
                </div>
            </form>

        </div>

        <div v-else-if="currentUser.length == 1 && allProductsInCart.length == 0">
            <h1 class="mt-5 text-center cart-title" style="font-family: 'Fjalla One', sans-serif;">Oops</h1>
            <p class="text-center" style="color: #777">Il n'y a rien dans votre panier !</p>
            <router-link to="/"class="text-center d-block" style="color: #979797"><small>Explorer la boutique</small></router-link>
        </div>

        <div v-else>
            <h1 class="mt-5 text-center cart-title" style="font-family: 'Fjalla One', sans-serif;">Oops</h1>
            <p class="text-center" style="color: #777">Vous devez être connecté pour accéder à votre panier !</p>
            <a href="login.php" class="text-center d-block" style="color: #979797"><small>Se connecter</small></a>
        </div>

    </div>
    `,
    name: 'Cart',
    data: () => {
        return {
            currentUser: '', // Check if user is logged
            allProductsInCart: '',
        }
    },
    methods: {
        checkUser() {
            axios
                .post('admin/action.php', {
                    action: 'checkuser'
                })
                .then(response => (this.currentUser = response.data))
        },
        getImgUrl(picture) {
            return "assets/" + picture;
        },
        // Get all products in cart
        fetchAllProductsInCart() {
            axios
                .post('admin/action.php', {
                    action: 'fetchallproductsincart'
                }).then(response => (this.allProductsInCart = response.data))
        },
        updateQuantity(product, updateType, cartId, productQuantity) {
            for (let i = 0; i < this.allProductsInCart.length; i++) {
                if (this.allProductsInCart[i].cart_id === product.cart_id) {
                    // Decrement
                    if (updateType === 'substract') {
                        if (this.allProductsInCart[i].product_quantity > 1) {
                            this.allProductsInCart[i].product_quantity--;
                        }
                        // Increment
                    } else if (updateType === 'add') {
                        this.allProductsInCart[i].product_quantity++;
                        // V-model input changed
                    } else {
                        axios
                            .post('admin/action.php', {
                                action: 'updatequantity',
                                cartId: cartId,
                                productQuantity: productQuantity
                            }).then(response => (console.log(response)))

                        break;
                    }

                    axios
                        .post('admin/action.php', {
                            action: 'updatequantity',
                            cartId: cartId,
                            productQuantity: this.allProductsInCart[i].product_quantity
                        }).then(response => (console.log(response)))

                    break;
                }

            }
        },
        deleteProduct(product, cartId) {
            this.allProductsInCart.splice(this.allProductsInCart.indexOf(product), 1);
            axios
                .post('admin/action.php', {
                    action: 'deleteproduct',
                    cartId: cartId
                }).then(response => (console.log(response)))
        },
        confirmTotalToPay() {
            console.log(this.totalToPay);
            axios
                .post('admin/action.php', {
                    action: 'confirm-total-to-pay',
                    totalToPay: this.totalToPay
                })
                .catch((error) => {
                    console.warn('Not good man :(');
                })
            window.location.href = "paypalForm.php";
        }
    },
    computed: {
        totalToPay() {
            let total = 0;
            for (let product of this.allProductsInCart) {
                total += (product.product_price * product.product_quantity);
                total = total.toFixed(2); // Returns a string
                total = Number(total);
            }
            return total;
        }
    },
    created() {
        this.checkUser();
        this.fetchAllProductsInCart();
    },
}


// Router ============
const router = new VueRouter({
    routes: [
        { path: '/', component: Home, name: 'Home' },
        { path: '/about', component: About, name: 'About' },
        { path: '/product-sheet/:id', component: ProductSheet, name: 'ProductSheet' },
        { path: '/contact', component: Contact, name: 'Contact' },
        { path: '/cart', component: Cart, name: 'Cart' }
    ],
})


// Vue Instance ============
const vue = new Vue({
    data: () => {
        return {
            allCategories: '',
        }
    },
    methods: {
        // Get all categories
        fetchAllCategories() {
            axios
                .post('admin/action.php', {
                    action: 'fetchallcategories'
                }).then(response => (this.allCategories = response.data))
        },
    },
    created() {
        // Call function fetchAllCategories
        this.fetchAllCategories();
    },
    router,
    components: { Home, About, Contact, Cart, ProductSheet }
}).$mount('#app');