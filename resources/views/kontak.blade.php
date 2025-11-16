<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Saya - CV Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
        }
        
        .card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
        }
        
        .contact-info {
            flex: 1;
            min-width: 300px;
            padding: 40px;
            background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .contact-form {
            flex: 1;
            min-width: 300px;
            padding: 40px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: white;
        }
        
        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 15px;
            transition: transform 0.3s, background 0.3s;
        }
        
        .info-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
        }
        
        .info-icon {
            background: white;
            color: #2575fc;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            font-size: 1.2rem;
        }
        
        .info-content h3 {
            margin-bottom: 5px;
            font-size: 1.1rem;
        }
        
        .info-content p, .info-content a {
            color: white;
            text-decoration: none;
            opacity: 0.9;
        }
        
        .info-content a:hover {
            text-decoration: underline;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: white;
            color: #2575fc;
            border-radius: 50%;
            text-decoration: none;
            transition: transform 0.3s, background 0.3s;
            font-size: 1.2rem;
        }
        
        .social-link:hover {
            transform: translateY(-5px);
            background: #f0f0f0;
        }
        
        .form-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #2575fc;
        }
        
        .form-subtitle {
            margin-bottom: 30px;
            color: #666;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #444;
            font-weight: 500;
        }
        
        input, textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: #2575fc;
        }
        
        textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .btn {
            background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(37, 117, 252, 0.4);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        footer {
            text-align: center;
            margin-top: 30px;
            color: white;
            opacity: 0.8;
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: #4CAF50;
            color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
        }

        .navigation {
            margin-bottom: 30px;
            text-align: center;
        }

        .nav-link {
            display: inline-block;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            transition: background 0.3s;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        @media (max-width: 768px) {
            .card {
                flex-direction: column;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .contact-info, .contact-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="navigation">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
        <a href="{{ route('pendidikan') }}" class="nav-link">Pendidikan</a>
        <a href="{{ route('pengalaman') }}" class="nav-link">Pengalaman</a>
        <a href="{{ route('keahlian') }}" class="nav-link">Keahlian</a>
        <a href="{{ route('portofolio') }}" class="nav-link">Portofolio</a>
        <a href="{{ route('kontak') }}" class="nav-link">Kontak</a>
    </div>

    <div class="container">
        <div class="card">
            <div class="contact-info">
                <div class="header">
                    <h1>Hubungi Saya</h1>
                    <p class="subtitle">Saya selalu tertarik dengan peluang baru dan proyek menarik. Mari kita ciptakan sesuatu yang luar biasa bersama!</p>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h3>Email</h3>
                        <p>
                            <a href="mailto:{{ $biodata->email ?? 'syafrifaadilah2@gmail.com' }}">
                                {{ $biodata->email ?? 'syafrifaadilah2@gmail.com' }}
                            </a>
                        </p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h3>Telepon</h3>
                        <p>
                            <a href="tel:{{ $biodata->telepon ?? '081385858364' }}">
                                {{ $biodata->telepon ?? '081385858364' }}
                            </a>
                        </p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <h3>Lokasi</h3>
                        <p>{{ $biodata->alamat ?? 'Cibadak, Sukabumi, Indonesia' }}</p>
                    </div>
                </div>
                
                <div class="social-links">
                    @if($biodata && $biodata->whatsapp)
                    <a href="https://wa.me/{{ $biodata->whatsapp }}" class="social-link" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    @else
                    <a href="https://wa.me/6281385858364" class="social-link" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    @endif
                    
                    @if($biodata && $biodata->linkedin)
                    <a href="{{ $biodata->linkedin }}" class="social-link" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    @else
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    @endif
                    
                    @if($biodata && $biodata->instagram)
                    <a href="{{ $biodata->instagram }}" class="social-link" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @else
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    
                    @if($biodata && $biodata->github)
                    <a href="{{ $biodata->github }}" class="social-link" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                    @else
                    <a href="#" class="social-link">
                        <i class="fab fa-github"></i>
                    </a>
                    @endif
                </div>
            </div>
            
            <div class="contact-form">
                <h2 class="form-title">Kirim Pesan</h2>
                <p class="form-subtitle">Isi formulir di bawah ini dan saya akan membalas pesan Anda secepatnya.</p>
                
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email Anda" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subjek Pesan</label>
                        <input type="text" id="subject" name="subject" placeholder="Masukkan subjek pesan" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Pesan Anda</label>
                        <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    
                    <button type="submit" class="btn">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="notification" id="notification">
        Pesan Anda telah berhasil dikirim!
    </div>
    
    <footer>
        <p>&copy; {{ date('Y') }} {{ $biodata->nama ?? 'CV Website' }}. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Mendapatkan nilai dari form
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            // Mendapatkan email dari biodata atau menggunakan default
            const recipientEmail = '{{ $biodata->email ?? "syafrifaadilah2@gmail.com" }}';
            
            // Membuat link email dengan data form
            const mailtoLink = `mailto:${recipientEmail}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(
                `Nama: ${name}\nEmail: ${email}\n\nPesan:\n${message}`
            )}`;
            
            // Membuka aplikasi email default
            window.location.href = mailtoLink;
            
            // Menampilkan notifikasi
            const notification = document.getElementById('notification');
            notification.style.display = 'block';
            notification.textContent = 'Membuka aplikasi email...';
            
            // Reset form
            document.getElementById('contactForm').reset();
            
            // Sembunyikan notifikasi setelah 5 detik
            setTimeout(() => {
                notification.style.display = 'none';
            }, 5000);
        });
        
        // Animasi untuk elemen info-item saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const infoItems = document.querySelectorAll('.info-item');
            infoItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    item.style.transition = 'opacity 0.5s, transform 0.5s';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 200 * index);
            });
        });
    </script>
</body>
</html>