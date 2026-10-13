# Perancangan Basis Data — BatuRafting

## 1. Entitas Utama
- **Users**: Admin dan Pelanggan (`id`, `name`, `email`, `password`, `role`, `created_at`)
- **Packages**: Pilihan paket petualangan (`id`, `title`, `description`, `price_per_person`, `duration`, `status`)
- **Bookings**: Reservasi pelanggan (`id`, `user_id`, `package_id`, `booking_date`, `participants`, `total_price`, `status`, `created_at`)
- **Schedules**: Kuota harian dan slot trip rafting (`id`, `date`, `slot_time`, `max_capacity`, `booked_capacity`)

## 2. Relasi (Sprint Berikutnya)
- 1 User memiliki banyak Booking (1:N)
- 1 Package dapat dipesan pada banyak Booking (1:N)
- 1 Schedule mengelola kapasitas untuk banyak Booking pada tanggal terkait (1:N)
