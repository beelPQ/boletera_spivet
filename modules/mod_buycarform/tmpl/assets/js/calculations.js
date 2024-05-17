
const calculate_iva = () => {
	let iva = parseFloat(document.querySelector(`#iva`).value);
	let subtotal = parseFloat(localStorage.getItem("subtotal"));
	let descuento = parseFloat(document.querySelector(`#descuento`).value);
	let percentage_discount = 0;
	if (descuento > 0) {
		if (subtotal > 0) {
			percentage_discount = (descuento * 100) / subtotal;
		}
	}
	let arrayProducts = JSON.parse(localStorage.getItem("cart_products"));
	let totaliva = 0;
	arrayProducts.forEach(function (product) {
		let price_product = parseFloat(product.pricemxn);
		if (descuento > 0) {
			price_product = price_product - (price_product * (percentage_discount / 100));
		}
		let product_iva = price_product * iva;
		totaliva = totaliva + product_iva;
	})
	return totaliva;
}

const calculate_total = () => {
	let subtotal = parseFloat(localStorage.getItem("subtotal"));
	let descuento = parseFloat(document.querySelector(`#descuento`).value);
	if ((subtotal - descuento) > 0) {
		let iva = 0;
		//verificamos IVA
		if (document.querySelector(`#addInvoice_yes`).checked) {
			iva = calculate_iva();
			//ponemos el IVA en campos y labels
			document.querySelector(`#amountIVA`).value = iva;
			let labelsIVA = document.querySelectorAll('.label-iva');
			labelsIVA.forEach(function (lbliva) {
				lbliva.innerHTML = formatMoney(iva);
			});
		} else {
			//ponemos el IVA en 0
			document.querySelector(`#amountIVA`).value = 0;
			let labelsIVA = document.querySelectorAll('.label-iva');
			labelsIVA.forEach(function (lbliva) {
				lbliva.innerHTML = '$0.00';
			});
		}
		let comision = 0;
		//verificamos comisiones
		if (document.querySelector(`#optionsPayment`).value != 'no_selected' && document.querySelector(`#optionsPayment`).value != '') {
			let total_before_commissions = (subtotal - descuento) + iva;
			let moneda = localStorage.getItem("moneda");
			let code = document.querySelector(`#optionsPayment`).value;
			let formData = new FormData();
			formData.append("option", "verifyCommissions")
			formData.append("total_before_commissions", total_before_commissions)
			formData.append("moneda", moneda);
			formData.append("code", code);
			asyncData2(`/modules/mod_buycarform/tmpl/model/requests.php`, `POST`, formData)
				.then((result) => {
					if (result.result == 'success') {
						comision = result.comision;
						//llenamos los campos relacionados a la comision
						document.querySelector(`#comision`).value = comision;
						document.querySelector(`#comision_porcentaje`).value = result.comision_porcentaje;
						let labelsComms = document.querySelectorAll('.label-commission');
						labelsComms.forEach(function (lblcomm) {
							lblcomm.innerHTML = formatMoney(comision);
						});
						let total = (subtotal - descuento) + iva + comision;
						//ponemos el total en campos y labels
						localStorage.setItem("amount", total)
						let labelsTotal = document.querySelectorAll('.label-total');
						labelsTotal.forEach(function (lbltotal) {
							lbltotal.innerHTML = formatMoney(total);
						});
					} else {
						document.querySelector(`#optionsPayment`).value = 'no_selected';
						//ponemos la comision en 0
						document.querySelector(`#comision`).value = 0;
						document.querySelector(`#comision_porcentaje`).value = 0;
						let labelsComms = document.querySelectorAll('.label-commission');
						labelsComms.forEach(function (lblcomm) {
							lblcomm.innerHTML = '$0.00';
						});
						let total = (subtotal - descuento) + iva + comision;
						//ponemos el total en campos y labels
						localStorage.setItem("amount", total)
						let labelsTotal = document.querySelectorAll('.label-total');
						labelsTotal.forEach(function (lbltotal) {
							lbltotal.innerHTML = formatMoney(total);
						});
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: result.message,
							confirmButtonText: 'Cerrar',
							customClass: {
								confirmButton: 'confirm-btn-alert',
							},
						});
					}
				}).catch((err) => {
					console.error(err)
					document.querySelector(`#optionsPayment`).value = 'no_selected';
					//ponemos la comision en 0
					document.querySelector(`#comision`).value = 0;
					document.querySelector(`#comision_porcentaje`).value = 0;
					let labelsComms = document.querySelectorAll('.label-commission');
					labelsComms.forEach(function (lblcomm) {
						lblcomm.innerHTML = '$0.00';
					});
					let total = (subtotal - descuento) + iva + comision;
					//ponemos el total en campos y labels
					localStorage.setItem("amount", total)
					let labelsTotal = document.querySelectorAll('.label-total');
					labelsTotal.forEach(function (lbltotal) {
						lbltotal.innerHTML = formatMoney(total);
					});
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Ocurrió un error al tratar de calcular las comisiones',
						confirmButtonText: 'Cerrar',
						customClass: {
							confirmButton: 'confirm-btn-alert',
						},
					});
				});
		} else {
			//ponemos la comision en 0
			document.querySelector(`#comision`).value = 0;
			document.querySelector(`#comision_porcentaje`).value = 0;
			let labelsComms = document.querySelectorAll('.label-commission');
			labelsComms.forEach(function (lblcomm) {
				lblcomm.innerHTML = '$0.00';
			});
			let total = (subtotal - descuento) + iva + comision;
			//ponemos el total en campos y labels
			localStorage.setItem("amount", total)
			let labelsTotal = document.querySelectorAll('.label-total');
			labelsTotal.forEach(function (lbltotal) {
				lbltotal.innerHTML = formatMoney(total);
			});
		}
	} else {
		//se aplico un cupon del 100%, por lo tanto
		//ponemos el IVA en 0
		document.querySelector(`#amountIVA`).value = 0;
		let labelsIVA = document.querySelectorAll('.label-iva');
		labelsIVA.forEach(function (lbliva) {
			lbliva.innerHTML = '$0.00';
		});
		//ponemos la comision en 0
		document.querySelector(`#comision`).value = 0;
		document.querySelector(`#comision_porcentaje`).value = 0;
		let labelsComms = document.querySelectorAll('.label-commission');
		labelsComms.forEach(function (lblcomm) {
			lblcomm.innerHTML = '$0.00';
		});
		//ponemos el total en 0
		localStorage.setItem("amount", 0)
		let labelsTotal = document.querySelectorAll('.label-total');
		labelsTotal.forEach(function (lbltotal) {
			lbltotal.innerHTML = '$0.00';
		});
		//la forma de pago ya no es necesaria
		if (subtotal > 0) {
			cleanFormPay();
		}
		if (location.pathname.includes('/carrito-de-capacitaciones-form')) {
			validateFormFinal();
		} else if (location.pathname.includes('/carrito-de-capacitaciones')) {
			if (finalStep1 == 0 && finalStep2 == 0 && finalStep3 == 1) {
				validateStep3();
			} else if (finalStep1 == 0 && finalStep2 == 0 && finalStep3 == 0) {
				validateStepsComplete();
			}
		}
	}
}

const calculate_cupon = (fromCupon = 0) => {
	let cupon;
	if (document.querySelector(`#cuponDesktop`) !== null) {
		cupon = $("#cuponDesktop").val();
	}
	if (document.querySelector(`#cuponMobile`) !== null) {
		cupon = $("#cuponMobile").val();
	}
	let moneda = localStorage.getItem("moneda");
	let subtotal = localStorage.getItem("subtotal");
	let formData = new FormData();
	formData.append("option", "applyCupon")
	formData.append("cupon", cupon)
	formData.append("moneda", moneda)
	formData.append("subtotal", subtotal)
	asyncData2(`/modules/mod_buycarform/tmpl/model/requests.php`, `POST`, formData)
		.then((result) => {
			if (result.result == 'success') {
				//llenamos los campos relacionados al descuento
				document.querySelector(`#descuento_aplicado`).value = result.descuento_aplicado;
				document.querySelector(`#descuento`).value = result.descuento;
				document.querySelector(`#tipo_descuento`).value = result.tipo_descuento;
				document.querySelector(`#code_descuento`).value = result.code_descuento;
				document.querySelector(`#iddescuento`).value = result.iddescuento;
				//actualizamos los labels que muestran el descuento
				let labelsDiscounts = document.querySelectorAll('.label-discount');
				labelsDiscounts.forEach(function (lbldiscount) {
					lbldiscount.innerHTML = formatMoney(result.descuento);
				});
				//deshabilitamos los campos del cupon
				let inputscupon = document.querySelectorAll('.input-cupon');
				inputscupon.forEach(function (inputcupon) {
					inputcupon.setAttribute("disabled", "");
				});
				let btnscupon = document.querySelectorAll('.btn-cupon');
				btnscupon.forEach(function (btncupon) {
					//btncupon.setAttribute("hidden", "");
					btncupon.setAttribute("disabled", "");
					btncupon.innerHTML = "Aplicado";
					btncupon.classList.remove("btn-cupon");
					btncupon.classList.add("btn-cupon-dis");
				});
				calculate_total();
				document.querySelector(`.spinner`).style.display = 'none';
				if (fromCupon == 1) {
					//Swal.fire("Correcto", "Cupón aplicado exitosamente", "success", "Aceptar");
					Swal.fire({
						icon: 'success',
						title: 'Correcto',
						text: 'Cupón aplicado exitosamente',
						confirmButtonText: 'Aceptar',
						customClass: {
							confirmButton: 'confirm-btn-alert',
						},
					});
				}
			} else {
				document.querySelector(`.spinner`).style.display = 'none';
				Swal.fire({
					title: 'Error',
					html: result.message,
					icon: 'error',
					confirmButtonText: 'Cerrar',
					customClass: {
						confirmButton: 'confirm-btn-alert'
					},
				});
			}
		}).catch((err) => {
			console.error(err)
			document.querySelector(`.spinner`).style.display = 'none';
			Swal.fire({
				title: 'Error',
				html: "Ocurrió un error al tratar de aplicar el cupón",
				icon: 'error',
				confirmButtonText: 'Cerrar',
				customClass: {
					confirmButton: 'confirm-btn-alert',
				},
			});
		});
}

const apply_cupon = () => {
	let condescuento = $("#descuento_aplicado").val();
	if (condescuento == "") {
		if (parseFloat(localStorage.getItem("subtotal")) > 0) {
			calculate_cupon(1);
		} else {
			document.querySelector(`.spinner`).style.display = 'none';
			//Swal.fire("Error", "No se puede aplicar un cupón debido a que no hay cursos o capacitaciones seleccionados.", "error", "Aceptar");
			Swal.fire({
				title: 'Error',
				html: "No se puede aplicar un cupón debido a que el subtotal es 0.",
				icon: 'error',
				confirmButtonText: 'Cerrar',
				customClass: {
					confirmButton: 'confirm-btn-alert',

				},
			});
		}
	} else {
		document.querySelector(`.spinner`).style.display = 'none';
	}
}