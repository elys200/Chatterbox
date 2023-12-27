from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.alert import Alert
from datetime import datetime
import time
from link import login_url, username, password

driver = webdriver.Chrome()
driver.maximize_window()
driver.get(login_url)

username_field = driver.find_element(By.XPATH, '//input[@name="username"]')
password_field = driver.find_element(By.XPATH, '//input[@name="password"]')
login_button = driver.find_element(By.XPATH, '//input[@type="submit"]')

username_field.send_keys(username)
time.sleep(2)
password_field.send_keys(password)
time.sleep(2)
login_button.click()

time.sleep(5)

try:
    tombol_produk = driver.find_element(
        By.XPATH, "//a[@href='produk/produk.php']")
    tombol_produk.click()
    time.sleep(3)

    # TAMBAH
    tombol_tambah = driver.find_element(
        By.XPATH, ".//a[@href='tambah_produk.php']")
    tombol_tambah.click()
    time.sleep(3)

    nama_produk_input = driver.find_element(By.NAME, "nama_produk")
    harga_produk_input = driver.find_element(By.NAME, "harga_produk")
    jumlah_produk_input = driver.find_element(By.NAME, "jumlah_produk")
    game_input = driver.find_element(By.NAME, "game")
    tombol_tambah = driver.find_element(By.XPATH, "//button[text()='Tambah']")

    nama_produk_input.send_keys("300 Genesis Crystals")
    time.sleep(3)
    harga_produk_input.send_keys("50000")
    time.sleep(3)
    jumlah_produk_input.send_keys("10")
    time.sleep(3)
    game_input.send_keys("Genshin Impact")
    time.sleep(3)

    tombol_tambah.click()
    time.sleep(3)

    # EDIT
    tombol_ubah = driver.find_element(
        By.XPATH, "(//table[@id='tabel-produk']//tr[position()=1]//a[text()='Edit'])[1]")
    tombol_ubah.click()
    time.sleep(3)

    nama_produk_input = driver.find_element(By.NAME, "nama_produk")
    harga_produk_input = driver.find_element(By.NAME, "harga_produk")
    jumlah_produk_input = driver.find_element(By.NAME, "jumlah_produk")
    tombol_update = driver.find_element(By.XPATH, "//button[text()='Update']")

    nama_produk_input.clear()
    time.sleep(2)
    nama_produk_input.send_keys("500 Genesis Crystals")
    time.sleep(3)

    harga_produk_input.clear()
    time.sleep(2)
    harga_produk_input.send_keys("100000")
    time.sleep(3)

    jumlah_produk_input.clear()
    time.sleep(2)
    jumlah_produk_input.send_keys("3")
    time.sleep(3)

    tombol_update.click()
    time.sleep(3)

    # HAPUS
    kriteria = "500 Genesis Crystals"

    # Temukan baris yang sesuai dengan kriteria
    baris = driver.find_element(
        By.XPATH, f"//table[@id='tabel-produk']//tr[td[contains(text(), '{kriteria}')]]")

    # Klik tombol "Hapus" di baris yang sesuai
    tombol_hapus = baris.find_element(By.XPATH, ".//a[text()='Hapus']")
    tombol_hapus.click()

    # Menghadapi konfirmasi alert dan menyetujui (klik OK)
    alert = Alert(driver)
    time.sleep(3)
    alert.accept()
    time.sleep(3)

    # Memeriksa apakah elemen game masih ada di halaman (menandakan data masih ada)
    elemen_produk = driver.find_elements(
        By.XPATH, f"//table[@class='table table-striped']//tr[td[contains(text(), '{kriteria}')]]")
    if not elemen_produk:
        status = "Berhasil"
    else:
        status = "Gagal"

except Exception as e:
    status = "Gagal"
    print(f"Terjadi kesalahan: {e}")

finally:
    # Menyimpan hasil uji ke dalam file txt
    with open("uji-fungsionalitas.txt", "a") as file:
        waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        file.write(
            f"{waktu_uji} - Fitur CRUD Produk - Status: {status} \n")

    # Menutup browser setelah selesai
    driver.quit()
