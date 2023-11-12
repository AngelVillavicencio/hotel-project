import React from 'react';
import ReactDOM from 'react-dom';
import { AppstoreOutlined, MailOutlined } from '@ant-design/icons';
import { Menu } from 'antd';
import Axios from 'axios';
import { appDefaultValues } from '../AppConstants';

function getItem(label, key, icon, children, type) {
  return {
    key,
    icon,
    children,
    label,
    type,
  };
}

const items = [

  getItem('Administrador', 'adminMenu', <MailOutlined />, [
    getItem('Dashboard', 'sub11'),
    getItem('Productos', 'productIndex'),
    getItem('Habitaciones', 'roomIndex'),
    getItem('Clientes', 'customerIndex'),
    getItem('Suministros', 'sub13'),
  ]),

  getItem('Recepción Hotel', 'recepcionHotelMenu', <AppstoreOutlined />, [
    getItem('Registrar Cliente', 'sub21'),
    getItem('Realizar Reserva', 'bookingCreate'),
    getItem('Reservas', 'sub23'),
  ]),

  getItem('Recepción Lavandería', 'sub3', <AppstoreOutlined />, [
    getItem('Registrar Solicitud', 'sub31'),
    getItem('Solicitudes', 'sub32'),
  ]),

  getItem('Salir', 'logout'),

];

const urlActual = window.location.href;

let customerIndex = appDefaultValues.StringDefault;
let productIndex = appDefaultValues.StringDefault;
let roomIndex = appDefaultValues.StringDefault;
let bookingCreate = appDefaultValues.StringDefault;
let logout = appDefaultValues.StringDefault;
let login = appDefaultValues.StringDefault;
let menuSelected = appDefaultValues.StringDefault;
let menuOpenSelected = appDefaultValues.StringDefault;

if (document.getElementById('MenuApp')) {
  customerIndex = document.getElementById('MenuApp').getAttribute('data-customer-index');
  productIndex = document.getElementById('MenuApp').getAttribute('data-product-index');
  roomIndex = document.getElementById('MenuApp').getAttribute('data-room-index');
  bookingCreate = document.getElementById('MenuApp').getAttribute('data-booking-create');
  logout = document.getElementById('MenuApp').getAttribute('data-logout');
  login = document.getElementById('MenuApp').getAttribute('data-login');
}

if (urlActual === customerIndex) {
  menuSelected = "customerIndex";
}

if (urlActual === productIndex) {
  menuSelected = "productIndex";
}

if (urlActual === roomIndex) {
  menuSelected = "roomIndex";
}

if (urlActual === bookingCreate) {
  menuSelected = "bookingCreate";
}

for (let index = 0; index < items.length; index++) {
  const element = items[index];
  const children = element.children;

  for (let index = 0; index < children?.length; index++) {
    const elementChildren = children[index];
    if (elementChildren.key === menuSelected) {
      menuOpenSelected = element.key;
    }
  }
}

const MenuApp = () => {

  const onClick = (e) => {

    if (e.key === "productIndex") {
      window.location.href = productIndex;
    }
    if (e.key === "roomIndex") {
      window.location.href = roomIndex;
    }
    if (e.key === "customerIndex") {
      window.location.href = customerIndex;
    }
    if (e.key === "bookingCreate") {
      window.location.href = bookingCreate;
    }
    if (e.key === "logout") {
      Axios.post(logout).then(() => {
        window.location.href = login;
      })
    }
  };

  return (
    <Menu
      onClick={onClick}
      style={{
        width: 256,
      }}
      defaultSelectedKeys={[menuSelected]}
      defaultOpenKeys={[menuOpenSelected]}
      mode="inline"
      items={items}
    />
  );
};

export default MenuApp;

if (document.getElementById('MenuApp')) {
  ReactDOM.render(<MenuApp />, document.getElementById('MenuApp'));
}
