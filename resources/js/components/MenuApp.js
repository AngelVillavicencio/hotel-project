import React from 'react';
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
  
  getItem('Administrador', 'sub1', <MailOutlined />, [
    getItem('Dashboard', 'sub11'),
    getItem('Productos', 'sub12'),
    getItem('Suministros', 'sub13'),
  ]),

  getItem('Recepción Hotel', 'sub2', <AppstoreOutlined />, [
    getItem('Registrar Cliente', '5'),
    getItem('Realizar Reserva', '6'),
    getItem('Reservas', '7'),
  ]),  

  getItem('Recepción Lavandería', 'sub3', <AppstoreOutlined />, [
    getItem('Registrar Solicitud', 'sub31'),
    getItem('Solicitudes', 'sub32'),
  ]),
];

const MenuApp = () => {
  
  const onClick = (e) => {
    console.log('click ', e);
  };

  return (
    <Menu
      onClick={onClick}
      style={{
        width: 256,
      }}
      defaultSelectedKeys={['1']}
      defaultOpenKeys={['sub1']}
      mode="inline"
      items={items}
    />
  );
};

export default MenuApp;

if (document.getElementById('MenuApp')) {
  ReactDOM.render(<MenuApp />, document.getElementById('MenuApp'));
}
