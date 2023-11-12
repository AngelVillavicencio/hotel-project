import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { AppstoreOutlined, MailOutlined, SettingOutlined } from '@ant-design/icons';
import { Menu } from 'antd';

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

  getItem('Recepción Hotel', 'sub2', <AppstoreOutlined />, [
    getItem('Registrar Cliente', 'sub21'),
    getItem('Realizar Reserva', 'bookingCreate'),
    getItem('Reservas', 'sub23'),
  ]),  

  getItem('Recepción Lavandería', 'sub3', <AppstoreOutlined />, [
    getItem('Registrar Solicitud', 'sub31'),
    getItem('Solicitudes', 'sub32'),
  ]),
];

const customerIndex = document.getElementById('MenuApp').getAttribute('data-customer-index');
const productIndex = document.getElementById('MenuApp').getAttribute('data-product-index');
const roomIndex = document.getElementById('MenuApp').getAttribute('data-room-index');
const bookingCreate = document.getElementById('MenuApp').getAttribute('data-booking-create');

const MenuApp = () => {

  const [menuSelected, setMenuSelected] = useState("productIndex");
  const [menuOpenSelected, setMenuOpenSelected] = useState("adminMenu");
  
  useEffect(() => {

    var urlActual = window.location.href;
    var tempMenuSelected = "";

    if (urlActual === customerIndex) {
      tempMenuSelected = "customerIndex";
    }

    if (urlActual === productIndex) {
      tempMenuSelected = "productIndex";
    }

    if (urlActual === roomIndex) {
      tempMenuSelected = "roomIndex";
    }

    if (urlActual === bookingCreate) {
      tempMenuSelected = "bookingCreate";
    }

    for (let index = 0; index < items.length; index++) {
      const element = items[index];
      const children = element.children;
      
      for (let index = 0; index < children.length; index++) {
        const elementChildren = children[index];
        if (elementChildren.key === tempMenuSelected) {
          setMenuOpenSelected(element.key);
        }
      }
    }

    setMenuSelected(tempMenuSelected);

  }, []);

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
  };

  return (
    <Menu
      onClick={onClick}
      style={{
        width: 256,
      }}
      selectedKeys={[menuSelected]}
      openKeys={[menuOpenSelected]}
      mode="inline"
      items={items}
    />
  );
};

export default MenuApp;

if (document.getElementById('MenuApp')) {
  ReactDOM.render(<MenuApp />, document.getElementById('MenuApp'));
}
