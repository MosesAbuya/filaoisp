USE filaoisp;

CREATE TABLE IF NOT EXISTS quote_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    service VARCHAR(255) NOT NULL,
    company VARCHAR(255) NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(45) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample blogs if table is empty
INSERT IGNORE INTO blogs (title, slug, excerpt, content, image_url) VALUES 
('The Future of Fiber Optics in Kenya', 'future-of-fiber-optics-kenya', 'Discover how next-generation fiber infrastructure is transforming connectivity and business operations across East Africa.', '<p>Fiber optic technology is rapidly evolving, bringing unprecedented speeds and reliability to businesses in Kenya. In this article, we explore the latest advancements in fiber infrastructure and how Filao Networks is leading the charge in delivering enterprise-grade connectivity.</p><p>From robust metropolitan networks to dedicated last-mile solutions, the future is incredibly bright. Businesses can now leverage symmetrical gigabit speeds to power cloud applications, VoIP, and massive data transfers without breaking a sweat.</p>', 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=800&q=80'),
('Why Your Business Needs Managed Network Services', 'managed-network-services-benefits', 'Managing IT infrastructure in-house can be costly and complex. Learn why outsourcing to a managed service provider is the smart move.', '<p>In today''s hyper-connected world, network downtime translates directly to lost revenue. Managing complex IT infrastructure requires specialized skills and constant monitoring, which can strain internal resources.</p><p>Managed Network Services (MNS) provide a proactive approach to IT management. With Filao Networks, you get 24/7 monitoring, rapid issue resolution, and expert optimization allowing your team to focus on core business objectives instead of troubleshooting routers.</p>', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80'),
('Securing Your Perimeter: A Guide to Modern CCTV', 'modern-cctv-security-guide', 'Physical security is just as crucial as cybersecurity. Explore the latest in AI-driven CCTV and perimeter defense systems.', '<p>Security has moved far beyond simple recording cameras. Modern CCTV systems incorporate artificial intelligence, facial recognition, and automated threat detection to provide unparalleled situational awareness.</p><p>Filao Networks integrates cutting-edge surveillance technology with robust network infrastructure. From biometric access control to smart perimeter fencing, our solutions ensure your assets remain protected around the clock.</p>', 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=800&q=80');
