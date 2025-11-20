<?php
session_start();
require_once 'config/db.php';

// Initialize cart jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get cart count
$cartCount = array_sum(array_column($_SESSION['cart'], 'qty'));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <!-- Bootstrap CSS -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="public/assets/css/tiny-slider.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet">
    <title>Shop - Furni</title>
    
    <style>
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .product-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 10px;
            background: #f8f9fa;
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
        
        .toast-notification {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            background: #28a745;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: none;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .product-price {
            color: #3b5d50;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .loading-spinner {
            text-align: center;
            padding: 50px;
        }
    </style>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="active"><a class="nav-link" href="shop.php">Shop</a></li>
                    <li><a class="nav-link" href="about.html">About us</a></li>
                    <li><a class="nav-link" href="services.html">Services</a></li>
                    <li><a class="nav-link" href="blog.html">Blog</a></li>
                    <li><a class="nav-link" href="contact.html">Contact us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="#"><img src="public/assets/images/user.svg"></a></li>
                    <li>
                        <a class="nav-link position-relative" href="cart.php">
                            <img src="public/assets/images/cart.svg">
                            <?php if ($cartCount > 0): ?>
                            <span id="cart-count" class="cart-badge"><?= $cartCount ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop</h1>
                        <p class="mb-4">Browse our collection of quality furniture</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-4">Our Products</h2>
                </div>
            </div>
            
            <!-- Loading Spinner -->
            <div id="loading-spinner" class="loading-spinner">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3">Loading products...</p>
            </div>
            
            <!-- Product Grid -->
            <div id="product-grid" class="row" style="display: none;">
                <!-- Products will be loaded here -->
            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Toast Notification -->
    <div id="success-toast" class="toast-notification">
        <i class="fas fa-check-circle me-2"></i>
        <span>Product added to cart!</span>
    </div>

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">
            <div class="sofa-img">
                <img src="images/sofa.png" alt="Image" class="img-fluid">
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center">
                            <span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span>
                            <span>Subscribe to Newsletter</span>
                        </h3>
                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                    <p class="mb-4">High quality furniture for your home and office.</p>
                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    
    <script>
        // Load products
        async function loadProducts() {
            try {
                console.log('Fetching products...');
                const response = await fetch('get_products.php');
                console.log('Response status:', response.status);
                
                const data = await response.json();
                console.log('Data received:', data);

                const grid = document.getElementById('product-grid');
                const loading = document.getElementById('loading-spinner');

                if (data.success && data.products.length > 0) {
                    grid.innerHTML = data.products.map(product => {
                        // Path gambar relatif dari root
                        const imagePath = product.image 
                            ? `public/assets/images/products/${product.image}` 
                            : 'images/product-1.png';
                        
                        console.log('Product image path:', imagePath);
                        
                        return `
                            <div class="col-12 col-md-6 col-lg-3 mb-5">
                                <div class="product-card">
                                    <a class="product-item" href="product-detail.php?id=${product.id_product}">
                                        <img src="${imagePath}" 
                                             class="product-image img-fluid" 
                                             alt="${product.name}"
                                             onerror="this.onerror=null; this.src='images/product-1.png';">
                                        <h3 class="product-title mt-3">${product.name}</h3>
                                        <p class="product-category text-muted small mb-2">
                                            ${product.category_name || 'Uncategorized'}
                                        </p>
                                        <strong class="product-price">Rp ${parseInt(product.price).toLocaleString('id-ID')}</strong>
                                    </a>
                                    <button onclick="addToCart(event, ${product.id_product}, '${product.name.replace(/'/g, "\\'")}', ${product.price})" 
                                            class="btn btn-primary mt-3 w-100">
                                        <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                    </button>
                                </div>
                            </div>
                        `;
                    }).join('');
                    
                    loading.style.display = 'none';
                    grid.style.display = 'flex';
                } else {
                    console.error('No products or failed:', data);
                    grid.innerHTML = `
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                            <p class="text-muted">No products available.</p>
                            <small class="text-danger">${data.message || ''}</small>
                        </div>
                    `;
                    loading.style.display = 'none';
                    grid.style.display = 'block';
                }
            } catch (error) {
                console.error('Error loading products:', error);
                document.getElementById('loading-spinner').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Error: ${error.message}
                    </div>
                `;
            }
        }

        // Add to cart
        async function addToCart(event, id, name, price) {
            event.preventDefault();
            event.stopPropagation();
            
            try {
                const formData = new FormData();
                formData.append('id_product', id);
                formData.append('name', name);
                formData.append('price', price);
                formData.append('qty', 1);

                const response = await fetch('cart_add.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Update cart count
                    const cartBadge = document.getElementById('cart-count');
                    if (cartBadge) {
                        cartBadge.textContent = data.cart_count;
                    } else {
                        // Create badge if doesn't exist
                        const cartLink = document.querySelector('a[href="cart.php"]');
                        if (cartLink) {
                            const badge = document.createElement('span');
                            badge.id = 'cart-count';
                            badge.className = 'cart-badge';
                            badge.textContent = data.cart_count;
                            cartLink.appendChild(badge);
                        }
                    }

                    // Show toast
                    const toast = document.getElementById('success-toast');
                    toast.style.display = 'block';
                    setTimeout(() => {
                        toast.style.display = 'none';
                    }, 2000);
                } else {
                    alert('Failed: ' + (data.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to add to cart');
            }
        }

        // Load on page ready
        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
        });
    </script>
</body>

</html>