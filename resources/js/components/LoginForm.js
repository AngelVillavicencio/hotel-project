import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { Button, Form, Input, Card, Spin, message } from 'antd';
import Axios from 'axios';
import { appDefaultValues } from '../AppConstants';

let appName = appDefaultValues.StringDefault;
let loginRoute = appDefaultValues.StringDefault;
let homeRoute = appDefaultValues.StringDefault;

if (document.getElementById('LoginForm')) {
    appName = document.getElementById('LoginForm').getAttribute('data-app-name');
    loginRoute = document.getElementById('LoginForm').getAttribute('data-login');
    homeRoute = document.getElementById('LoginForm').getAttribute('data-home');
}

const LoginForm = () => {

    const [messageApi, contextHolder] = message.useMessage();

    const [loading, setLoading] = useState(false);

    const errorAlert = (text) => {
        messageApi.open({
            type: 'error',
            content: text,
        });
    };

    const onFinish = (values) => {
        setLoading(true);
        Axios.post(loginRoute, values).then(() => {
            window.location.href = homeRoute;
        }).catch(error => {

            if (error.response !== undefined) {

                const { response } = error;

                if (response.status === 422 || response.status === 429) {

                    const data = response.data;

                    for (let index = 0; index < data.errors.dni.length; index++) {
                        const element = data.errors.dni[index];
                        errorAlert(element);
                    }
                }

            }

        }).finally(() => {
            setLoading(false);
        });
    };

    return (
        <div className='login-container'>
            {contextHolder}
            <Spin spinning={loading} delay={500}>
                <Card
                    title={appName}
                    bordered={false}
                    style={{
                        width: 500,
                    }}
                >
                    <Form
                        name="basic"
                        labelCol={{
                            span: 8,
                        }}
                        wrapperCol={{
                            span: 16,
                        }}
                        style={{
                            maxWidth: 600,
                        }}
                        initialValues={{
                            remember: true,
                        }}
                        onFinish={onFinish}
                        autoComplete="off"
                    >
                        <Form.Item
                            label="DNI"
                            name="dni"
                            rules={[
                                {
                                    required: true,
                                    message: 'Por favor, ingresa un DNI.',
                                },
                            ]}
                        >
                            <Input />
                        </Form.Item>

                        <Form.Item
                            label="Contraseña"
                            name="password"
                            rules={[
                                {
                                    required: true,
                                    message: 'Por favor, ingresa una contraseña.',
                                },
                            ]}
                        >
                            <Input.Password />
                        </Form.Item>

                        <Form.Item
                            wrapperCol={{
                                offset: 8,
                                span: 16,
                            }}
                        >
                            <Button type="primary" htmlType="submit">
                                Ingresar
                            </Button>
                        </Form.Item>
                    </Form>
                </Card>
            </Spin>
        </div>
    );

}

export default LoginForm;

if (document.getElementById('LoginForm')) {
    ReactDOM.render(<LoginForm />, document.getElementById('LoginForm'));
}