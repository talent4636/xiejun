<?php
error_reporting(E_ALL);
echo "<h2>tcp/ip connection </h2>\n";
// $service_port = 10005;
$service_port = 1935;
$address = '127.0.0.1';

/*
* resource socket_create ( int $domain , int $type , int $protocol )
* ---------------------------------------------------
* 创建并返回一个套接字，也称作一个通讯节点。一个典型的网络连接由 2 个套接字构成，一个运行在客户端，另一个运行在服务器端
* 
* [$domain]   描述
* AF_INET     IPv4 网络协议。TCP 和 UDP 都可使用此协议。
* AF_INET6    IPv6 网络协议。TCP 和 UDP 都可使用此协议。
* AF_UNIX     本地通讯协议。具有高性能和低成本的 IPC（进程间通讯）。
* [$type]         描述
* SOCK_STREAM     提供一个顺序化的、可靠的、全双工的、基于连接的字节流。支持数据传送流量控制机制。TCP 协议即基于这种流式套接字。
* SOCK_DGRAM      提供数据报文的支持。(无连接，不可靠、固定最大长度).UDP协议即基于这种数据报文套接字。
* SOCK_SEQPACKET  提供一个顺序化的、可靠的、全双工的、面向连接的、固定最大长度的数据通信；数据端通过接收每一个数据段来读取整个数据包。
* SOCK_RAW        提供读取原始的网络协议。这种特殊的套接字可用于手工构建任意类型的协议。一般使用这个套接字来实现 ICMP 请求（例如 ping）。
* SOCK_RDM        提供一个可靠的数据层，但不保证到达顺序。一般的操作系统都未实现此功能。
* [$protocol]  描述
* ICMP         Internet Control Message Protocol 主要用于网关和主机报告错误的数据通信。例如“ping”命令（在目前大部分的操作系统中）就是使用 ICMP 协议实现的。
* UDP          User Datagram Protocol 是一个无连接的、不可靠的、具有固定最大长度的报文协议。由于这些特性，UDP 协议拥有最小的协议开销。
* TCP          Transmission Control Protocol 是一个可靠的、基于连接的、面向数据流的全双工协议。TCP 能够保障所有的数据包是按照其发送顺序而接收的。
*              如果任意数据包在通讯时丢失，TCP 将自动重发数据包直到目标主机应答已接收。因为可靠性和性能的原因，TCP 在数据传输层使用 8bit 字节边界。因此，
*              TCP 应用程序必须允许传送部分报文的可能。
*
* socket_create() 正确时返回一个套接字，失败时返回 FALSE。要读取错误代码，可以调用 socket_last_error()。
* 这个错误代码可以通过 socket_strerror() 读取文字的错误说明。
*/
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
	echo "socket_create() 创建socket失败，失败原因：" . socket_strerror(socket_last_error()) . "\n";
} else {
	echo "socket_create() 创建socket成功。<br/>\n";
}

echo "正在尝试链接到 '$address' ，端口 '$service_port'...<br/>\n";
/**
 * bool socket_connect ( resource $socket , string $address [, int $port = 0 ] )
 * --------------------------------------------------------------------------------
 * 用 socket_create() 创建的有效的套接字资源来连接到 $address 。
 * 
 * [$address]
 * 如果参数 socket 是 AF_INET ， 那么参数 address 则可以是一个点分四组表示法（例如 127.0.0.1 ） 的 IPv4 地址； 
 * 如果支持 IPv6 并且 socket 是 AF_INET6，那么 address 也可以是有效的 IPv6 地址（例如 ::1）；
 * 如果套接字类型为 AF_UNIX ，那么 address 也可以是一个Unix 套接字。
 * [$port]
 * 参数 port 仅仅用于 AF_INET 和 AF_INET6 套接字连接的时候，并且是在此情况下是需要强制说明连接对应的远程服务器上的端口号。
 *
 * 成功时返回 TRUE， 或者在失败时返回 FALSE。 错误代码会传入 socket_last_error() ，
 * 如果将此参数传入 socket_strerror() 则可以得到错误的文字说明。
 */
$result = @socket_connect($socket, $address, $service_port);
if($result === false) {
	echo "socket_connect() 连接失败，原因: " . socket_strerror(socket_last_error($socket)) . "\n<br/>";
} else {
	echo "socket_connect() 连接成功 \n<br/>";
}
$in = "我发送的信息";
// $in = "HEAD http/1.1\r\n";
// $in .= "HOST: localhost \r\n";
// $in .= "Connection: close\r\n\r\n";
$out = "";
echo "发送http头请求 ...\n<br/>";
@socket_write($socket, $in, strlen($in));
echo  "发送完成\n<br/>";
echo "发送的内容为:<font color='red'>$in</font> <br>";

echo "<br/>\n读取返回信息:\n<br/>";
while ($out = socket_read($socket, 8192)) {
	echo "<font color='red'>".$out."</font>\n<br/>";
}
echo "关闭socket...\n<br/>";
socket_close($socket);
echo "关闭成功 .\n\n";
